<?php
/**
 * Created by Joseph Daigle.
 * Date: 2019-04-28
 * Time: 21:26
 */

namespace CleanGutter\Services\Review;


/**
 * Interface ICustomerReview.
 *
 * Describe a customer review.
 *
 * @package CleanGutter\Services
 */
interface ICustomerReview
{
	public function getReviewScore(): int;

	public function getReviewScale(): int;

	public function getReviewerName(): string;

	public function getReview(): string;

	public function getSourceName(): string;

	public function getSourceUrl(): string;
}