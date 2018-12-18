package com.ziggy192.model;


import com.ziggy192.AppConstant;
import com.ziggy192.main.HCMQuizParser;

import java.io.File;
import java.util.List;

public class Main {


    public static void main(String[] args) {

	// write your code here


		run(args);
//		test();
//		testGetFiles();
    }

	public static void run(String[] args) {

		String resourcePath = AppConstant.RESOURCES_MAIN_PATH;
		String outputFileName = AppConstant.DEFAULT_OUTPUT_FILE;

		for (int i = 0; i < args.length; i+=2) {
			String key = args[i];
			String value = args[i + 1];
			switch (key) {
				case AppConstant.CMD_OUTPUT_FILE_NAME:
					outputFileName = value;

				break;
				case AppConstant.CMD_RESOURCE_PATH:
					resourcePath = value;

					break;
				default:
					System.out.println(String.format("Cant recognize argument '%s'", key));

			}
		}
		System.out.println("Running...");


		Runnable task = new HCMQuizParser(resourcePath, outputFileName);
		new Thread(task).start();

	}
	public static void test() {
		File file = new File("./resources");
		System.out.println(file.getAbsoluteFile());

	}

	public static void testGetFiles() {
		HCMQuizParser parser = new HCMQuizParser(AppConstant.RESOURCES_MAIN_PATH,AppConstant.DEFAULT_OUTPUT_FILE);
		List<File> files = parser.getFiles(new File(AppConstant.RESOURCES_MAIN_PATH));
		for (File file : files) {
			System.out.println(file.getAbsolutePath());
		}


	}

}
