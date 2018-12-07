package com.ziggy192.model;

public class Question {
	private String questionText;
	private String answerText;

	public Question(String questionText, String answerText) {
		this.questionText = questionText;
		this.answerText = answerText;
	}

	public Question() {
	}

	public String getQuestionText() {
		return questionText;
	}

	public void setQuestionText(String questionText) {
		this.questionText = questionText;
	}

	public String getAnswerText() {
		return answerText;
	}

	public void setAnswerText(String answerText) {
		this.answerText = answerText;
	}

	@Override
	public String toString() {
		return "Question{" +
				"questionText='" + questionText + '\'' +
				", answerText='" + answerText + '\'' +
				'}';
	}
}
