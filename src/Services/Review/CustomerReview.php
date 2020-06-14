<?php
/**
 * Created by Joseph Daigle.
 * Date: 2019-04-28
 * Time: 21:25
 */

namespace CleanGutter\Services\Review;

/**
 * CustomerReview.
 *
 * @package CleanGutter\Services\Review
 */
class CustomerReview implements ICustomerReview
{
	/**
	 * @var int
	 */
	private $reviewScore;

	/**
	 * @var int
	 */
	private $reviewScale;

	/**
	 * @var string
	 */
	private $reviewerName;

    /**
     * @var string Use 'Atlanta, GA' format.
     */
    private $reviewerLocation;

	/**
	 * @var string
	 */
	private $reviewText;

	/**
	 * @var string
	 */
	private $sourceName;

	/**
	 * @var string
	 */
	private $sourceUrl;

	/**
	 * CustomerReview constructor.
	 *
	 * @param int    $reviewScore
	 * @param int    $reviewScale
	 * @param string $reviewerName
     * @param string $reviewerLocation
	 * @param string $reviewText
	 * @param string $sourceName
	 * @param string $sourceUrl
	 */
    public function __construct(
        int $reviewScore,
        int $reviewScale,
        string $reviewerName,
        string $reviewerLocation,
        string $reviewText,
        string $sourceName,
        string $sourceUrl
    ) {
        $this->reviewScore      = $reviewScore;
        $this->reviewScale      = $reviewScale;
        $this->reviewerName     = $reviewerName;
        $this->reviewerLocation = $reviewerLocation;
        $this->reviewText       = $reviewText;
        $this->sourceName       = $sourceName;
        $this->sourceUrl        = $sourceUrl;
    }

	/**
	 * @return int
	 */
	public function getReviewScore(): int
	{
		return $this->reviewScore;
	}

	/**
	 * @return int
	 */
	public function getReviewScale(): int
	{
		return $this->reviewScale;
	}

	/**
	 * @return string
	 */
	public function getReviewerName(): string
	{
		return $this->reviewerName;
	}

    /**
     * @return string
     */
    public function getReviewerLocation(): string
    {
        return $this->reviewerLocation;
    }

	/**
	 * @return string
	 */
	public function getReviewText(): string
	{
		return $this->reviewText;
	}

	/**
	 * @return string
	 */
	public function getSourceName(): string
	{
		return $this->sourceName;
	}

	/**
	 * @return string
	 */
	public function getSourceUrl(): string
	{
		return $this->sourceUrl;
	}

}