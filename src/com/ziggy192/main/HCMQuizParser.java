package com.ziggy192.main;

import com.ziggy192.model.HCMQuestion;
import com.ziggy192.utils.FileUtil;
import com.ziggy192.utils.StaxParserUtils;

import javax.xml.stream.XMLEventReader;
import javax.xml.stream.events.StartElement;
import javax.xml.stream.events.XMLEvent;
import java.io.File;
import java.io.FileFilter;
import java.io.FilenameFilter;
import java.util.*;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class HCMQuizParser implements Runnable {

	private File resourcePath;
	private File outputFile;


	public HCMQuizParser(String resourcePath, String outputFileName) {
		File file = new File(resourcePath);
		this.resourcePath = file;
		File outputFile = new File(outputFileName);
		this.outputFile = outputFile;

	}

	public List<File> getFiles(File file) {
		List<File> fileList = new ArrayList<>();
		if (file.isDirectory()) {
			File folder = file;
			File[] files = folder.listFiles(new FileFilter() {
				@Override
				public boolean accept(File pathname) {
					return pathname.isDirectory() || pathname.getName().endsWith(".html") || pathname.getName().endsWith(".htm");
				}
			});

			for (File subFile : files) {
				if (subFile.isDirectory()) {
					fileList.addAll(getFiles(subFile));
				} else if (subFile.isFile()) {
					fileList.add(subFile);
				}
			}
		}
		return fileList;

	}

	public List<HCMQuestion> getQuestionsFromAllFiles() {

		List<File> files = getFiles(resourcePath);
		List<HCMQuestion> questions = new ArrayList<>();

		for (File file : files) {
			questions.addAll(getQuestions(file));
		}
		return questions;
	}

	private List<HCMQuestion> getQuestions(File file) {
		String beginSign = "<div id=\"page\"";
		String endSign = "<footer id=\"footer\">";


		List<HCMQuestion> questionList = new ArrayList<>();
		String htmlContent = StaxParserUtils.parseHtmlFromFile(file, beginSign, endSign);
		htmlContent = StaxParserUtils.addMissingTag(htmlContent);
//		htmlContent = StaxParserUtils.removeEmptyAttributes(htmlContent);

		HCMQuestion questionModel = new HCMQuestion();
		try {
			XMLEventReader staxReader = StaxParserUtils.getStaxReader(htmlContent);
			while (staxReader.hasNext()) {
				XMLEvent event = staxReader.nextEvent();
				if (event.isStartElement()) {
					StartElement startElement = event.asStartElement();

					if (StaxParserUtils.checkAttributeContainsKey(startElement, "class", "que")) {
						//validate quesitonModel
						if (questionModel.isValidated()) {

							questionList.add(questionModel);
						}
						questionModel = new HCMQuestion();

					}
					if (StaxParserUtils.checkAttributeContainsKey(startElement, "class", "qtext")) {
						String questionContent = StaxParserUtils.getContentAndJumpToEndElement(staxReader, startElement);
						String questionContentRegex = "(U.*::)(.*)";
						Pattern pattern = Pattern.compile(questionContentRegex);
						Matcher matcher = pattern.matcher(questionContent);
						if (matcher.find()) {
							String questionId = matcher.group(1);
							String questionText = matcher.group(2);
							if (!questionText.isEmpty()) {
								questionModel.setQuestionText(questionText);
							}
							if (!questionId.isEmpty()) {
								questionModel.setQuestionId(questionId);

							}
						}

					}

					if (StaxParserUtils.checkAttributeContainsKey(startElement, "class", "ablock")) {
						//traverse to end
						int stackCount = 1;
						String answerContent = "";
						while (stackCount > 0) {
							event = staxReader.nextEvent();
							if (event.isStartElement()) {
								stackCount++;
								startElement = event.asStartElement();

								if (startElement.getName().getLocalPart().equals("label")
										|| (startElement.getName().getLocalPart().equals("div")
										&& StaxParserUtils.checkAttributeContainsKey(startElement, "class", "prompt"))) {
									String content = StaxParserUtils.getContentAndJumpToEndElement(staxReader, startElement);
									answerContent += content + "\n";

									stackCount--;
								}


							}
							if (event.isEndElement()) {
								stackCount--;

							}
						}

						questionModel.setAnswerText(answerContent);


					}
				}
			}
		} catch (Exception e) {
			e.printStackTrace();

		}

		//validate quesitonModel
		if (questionModel.isValidated()) {
			questionList.add(questionModel);
		}
		//todo debugging
//		File output = new File(AppConstant.RESOURCES_PATH + "test/output.html");
//		StaxParserUtils.saveStringToFile(htmlContent, output);
		return questionList;
	}

	private List<HCMQuestion> removeDupplicates(List<HCMQuestion> hcmQuestions) {
		Set<HCMQuestion> set = new TreeSet<>(new Comparator<HCMQuestion>() {
			@Override
			public int compare(HCMQuestion o1, HCMQuestion o2) {

					return o1.compareTo(o2);
			}
		});
		set.addAll(hcmQuestions);
		return Arrays.asList(set.toArray(new HCMQuestion[]{}));
	}

	@Override
	public void run() {
		List<HCMQuestion> questions = getQuestionsFromAllFiles();
//		List<HCMQuestion> questions = getQuestions();
		questions = removeDupplicates(questions);
		Collections.sort(questions);


//		System.out.println("==========result");
//		for (HCMQuestion question : questions) {
//			System.out.println(question);
//
//		}
		System.out.println("Total = "+questions.size());

		FileUtil.exportToCsv(outputFile,questions);


//		FileUtil.exportToFile(outputFile,questions);

	}

}
