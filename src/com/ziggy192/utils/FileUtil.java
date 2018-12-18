package com.ziggy192.utils;

import com.opencsv.CSVReader;
import com.ziggy192.model.HCMQuestion;
import com.ziggy192.model.Question;

import java.io.*;
import java.util.ArrayList;
import java.util.List;

public class FileUtil {

	public static final String DEFAULT_BETWEEN_QUESTIONS_DELIMITER = ";$;\n";
	public static final String DEFAULT_QUESTION_ANSWER_DELIMITER = ";$@;\n";

	public static List<HCMQuestion> readQuestionFromCsv(String csvFile) {

		List<HCMQuestion> result = new ArrayList<>();
		CSVReader reader = null;
		try {
			reader = new CSVReader(new FileReader(csvFile));
			String[] line;
			while (( line = reader.readNext()) !=null) {
				HCMQuestion question = parseQuestionFromLine(line);
				result.add(question);
			}

		} catch (FileNotFoundException e) {
			e.printStackTrace();

		} catch (IOException e) {
			e.printStackTrace();
		}
		return result;
	}

	private static HCMQuestion parseQuestionFromLine(String[] line) {
		HCMQuestion result = new HCMQuestion(line[1], "", line[0]);
		return result;
	}

	public static String escapeQuotes(String input) {
		return input.replaceAll("\"", "“");
	}

	public static void exportToCsv(File file, List<HCMQuestion> questions) {
		PrintWriter writer = null;
		try {
			writer = new PrintWriter(file,"UTF-8");

			//use UTF-8 BOM ( Byte Order Mark ) to make excel recognize this file as utf-8 encoding
			writer.write("\ufeff");
			writer.flush();

			for (int i = 0; i < questions.size(); i++) {

				HCMQuestion question = questions.get(i);
				String id = question.getQuestionId();
				String questionText = question.getQuestionText() + "\n" + question.getAnswerText();
				id = escapeQuotes(id);
				questionText = escapeQuotes(questionText);
				writer.write(String.format("\"%s\",\"%s\"\n", id,questionText));
//				writer.write(question.getQuestionText());
//				writer.write(DEFAULT_QUESTION_ANSWER_DELIMITER);
//				writer.write(question.getAnswerText());
//				if (i < questions.size() - 1) {
//					writer.write(DEFAULT_BETWEEN_QUESTIONS_DELIMITER);
//				}
			}
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (UnsupportedEncodingException e) {
			e.printStackTrace();
		} finally {
			if (writer != null) {
				writer.close();
			}
		}
	}
	public static void exportToFile(File file, List<HCMQuestion> questions) {
		PrintWriter writer = null;
		try {
			writer = new PrintWriter(file,"UTF-8");

			for (int i = 0; i < questions.size(); i++) {

				Question question = questions.get(i);
				writer.write(question.getQuestionText());
				writer.write(DEFAULT_QUESTION_ANSWER_DELIMITER);
				writer.write(question.getAnswerText());
				if (i < questions.size() - 1) {
					writer.write(DEFAULT_BETWEEN_QUESTIONS_DELIMITER);
				}
			}
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (UnsupportedEncodingException e) {
			e.printStackTrace();
		} finally {
			if (writer != null) {
				writer.close();
			}
		}

	}

}
