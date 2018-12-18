package com.ziggy192.model;

import java.util.Objects;

public class HCMQuestion  extends Question implements Comparable<HCMQuestion>{
	private String questionId;


	public HCMQuestion(String questionText, String answerText, String questionId) {
		super(questionText, answerText);
		this.questionId = questionId;
	}

	public HCMQuestion() {
	}

	public String getQuestionId() {
		return questionId;
	}

	public void setQuestionId(String questionId) {
		this.questionId = questionId;
	}

	@Override
	public String toString() {
		return "HCMQuestion{" +
				"questionId='" + questionId + '\'' +
				"questionText='" + getQuestionText() + '\'' +
				", answerText='" + getAnswerText() + '\'' +
				"} ";
	}

	@Override
	public int compareTo(HCMQuestion that) {
		//todo debugging
		if (this.getQuestionId() == null
		) {
			System.out.println(this);
			return 0;
		}
		if (that.getQuestionId() == null) {
			System.out.println(that);
			return 0;
		}
		if (this.getQuestionId().isEmpty() || that.getQuestionId().isEmpty()) {
			return 0;
		}
		return this.getQuestionId().compareToIgnoreCase(that.getQuestionId());
	}

	public boolean isValidated() {
		return this.questionId != null && this.getAnswerText() != null && this.getQuestionText() != null;
	}

	@Override
	public boolean equals(Object o) {
		if (this == o) return true;
		if (o == null || getClass() != o.getClass()) return false;
		HCMQuestion question = (HCMQuestion) o;
		return Objects.equals(questionId, question.questionId);
	}

	@Override
	public int hashCode() {
		return Objects.hash(questionId);
	}
}
