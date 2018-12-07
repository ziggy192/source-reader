package com.ziggy192;


import java.io.File;
import java.util.List;

public class Main {


    public static void main(String[] args) {
	// write your code here
		run();
//		test();
//		testGetFiles();
    }

	public static void run() {
		Runnable task = new HCMQuizParser(AppConstant.RESOURCES_MAIN_PATH, AppConstant.DEFAULT_OUTPUT_FILE);
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
