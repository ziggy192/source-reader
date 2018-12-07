package com.ziggy192.utils;

import com.ziggy192.model.HCMQuestion;
import com.ziggy192.model.Question;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.PrintWriter;
import java.io.UnsupportedEncodingException;
import java.util.List;

public class FileUtil {

	public static final String DEFAULT_BETWEEN_QUESTIONS_DELIMITER = ";$;\n";
	public static final String DEFAULT_QUESTION_ANSWER_DELIMITER = ";$@;\n";


	public static void exportToCsv(File file, List<HCMQuestion> questions) {
		PrintWriter writer = null;
		try {
			writer = new PrintWriter(file,"UTF-8");

			//use UTF-8 BOM ( Byte Order Mark ) to make excel recognize this file as utf-8 encoding
			writer.write("\ufeff");
			writer.flush();

			for (int i = 0; i < questions.size(); i++) {

				HCMQuestion question = questions.get(i);
				writer.write(String.format("\"%s\",\"%s\n%s\"\n", question.getQuestionId(),question.getQuestionText(),question.getAnswerText()));
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
