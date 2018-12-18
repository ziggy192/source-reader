package com.ziggy192.main_fitler;

import com.ziggy192.AppConstant;
import com.ziggy192.model.HCMQuestion;
import com.ziggy192.utils.FileUtil;

import java.io.File;
import java.util.List;

public class QuestionOutputFilterTask implements Runnable {

	private String mainOutputFile;
	private List<String> filterFiles;

	public QuestionOutputFilterTask(String mainOutputFile, List<String> filterFiles) {
		this.mainOutputFile = mainOutputFile;
		this.filterFiles = filterFiles;
	}

	public String getMainOutputFile() {
		return mainOutputFile;
	}

	public void setMainOutputFile(String mainOutputFile) {
		this.mainOutputFile = mainOutputFile;
	}

	@Override
	public void run() {

		//read from mainOutputFile


		List<HCMQuestion> mainQuestions = FileUtil.readQuestionFromCsv(mainOutputFile);
		System.out.println("Beginning total = " + mainQuestions.size());



		//read from filterFiles

		System.out.println("Filtering....");
		for (String filterFile : filterFiles) {
			List<HCMQuestion> filterQuestions = FileUtil.readQuestionFromCsv(filterFile);
			mainQuestions.removeAll(filterQuestions);
		}
		//filter mainOutputfile with filterFiles


		System.out.println("Result total = " + mainQuestions.size());
		File outputFile = new File(AppConstant.DEFAULT_FILTERED_OUTPUT_FILE);

		FileUtil.exportToCsv(outputFile, mainQuestions);


	}
}
