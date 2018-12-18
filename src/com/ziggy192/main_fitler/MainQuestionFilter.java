package com.ziggy192.main_fitler;

import java.util.ArrayList;
import java.util.List;

public class MainQuestionFilter {
	public static void main(String[] args) {
		run(args);

	}

	public static void run(String[] args) {
		String mainQuestionFile = "";
		if (args.length == 0) {
			System.out.println("No arguments found !");
			return;
		}


		List<String> filterFiles = new ArrayList<>();
		for (int i = 0; i < args.length; i++) {
			String arg = args[i];
			if (i == 0) {
				mainQuestionFile = arg;
			} else {
				filterFiles.add(arg);
			}
		}


		new Thread(new QuestionOutputFilterTask(mainQuestionFile, filterFiles)).start();

	}
}
