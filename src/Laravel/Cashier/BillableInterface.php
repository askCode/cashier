<?php namespace Laravel\Cashier;

use DateTime;

interface BillableInterface {

	/**
	 * Get the name that should be shown on the entity's invoices.
	 *
	 * @return string
	 */
	public function getBillableName();

	/**
	 * Write the entity to persistent storage.
	 *
	 * @return void
	 */
	public function saveBillableInstance();

	/**
	 * Get a new billing builder instance for the given plan.
	 *
	 * @param  \Laravel\Cashier\PlanInterface|string|null  $plan
	 * @return \Laravel\Cashier\Builder
	 */
	public function subscription($plan = null);

	/**
	 * Invoice the billable entity outside of regular billing cycle.
	 *
	 * @return void
	 */
	public function invoice();

	/**
	 * Find an invoice by ID.
	 *
	 * @param  string  $id
	 * @return \Laravel\Cashier\Invoice|null
	 */
	public function findInvoice($id);

	/**
	 * Get an array of the entity's invoices.
	 *
	 * @return array
	 */
	public function invoices();

	/**
	 * Apply a coupon to the billable entity.
	 *
	 * @param  string  $coupon
	 * @return void
	 */
	public function applyCoupon($coupon);

	/**
	 * Determine if the entity is within their trial period.
	 *
	 * @return bool
	 */
	public function onTrial();

	/**
	 * Determine if the entity has an active subscription.
	 *
	 * @return bool
	 */
	public function subscribed();

	/**
	 * Determine if the entity's trial has expired.
	 *
	 * @return bool
	 */
	public function expired();

	/**
	 * Determine if the entity is on the given plan.
	 *
	 * @param  \Laravel\Cashier\PlanInterface|string  $plan
	 * @return bool
	 */
	public function onPlan($plan);

	/**
	 * Determine if billing requires a credit card up front.
	 *
	 * @return bool
	 */
	public function requiresCardUpFront();

	/**
	 * Determine if the entity is a Stripe customer.
	 *
	 * @return bool
	 */
	public function readyForBilling();

	/**
	 * Determine if the entity has a current Stripe subscription.
	 *
	 * @return bool
	 */
	public function stripeIsActive();

	/**
	 * Set whether the entity has a current Stripe subscription.
	 *
	 * @param  bool  $active
	 * @return \Laravel\Cashier\BillableInterface
	 */
	public function setStripeIsActive($active = true);

	/**
	 * Get the Stripe ID for the entity.
	 *
	 * @return string
	 */
	public function getStripeId();

	/**
	 * Set the Stripe ID for the entity.
	 *
	 * @param  string  $stripe_id
	 * @return \Laravel\Cashier\BillableInterface
	 */
	public function setStripeId($stripe_id);

	/**
	 * Get the last four digits of the entity's credit card.
	 *
	 * @return string
	 */
	public function getLastFourCardDigits();

	/**
	 * Set the last four digits of the entity's credit card.
	 *
	 * @return \Laravel\Cashier\BillableInterface
	 */
	public function setLastFourCardDigits($digits);

	/**
	 * Get the date on which the trial ends.
	 *
	 * @return \DateTime
	 */
	public function getTrialEndDate();

	/**
	 * Get the subscription end date for the entity.
	 *
	 * @return \DateTime
	 */
	public function getSubscriptionEndDate();

	/**
	 * Set the subscription end date for the entity.
	 *
	 * @param  \DateTime|null  $date
	 * @return void
	 */
	public function setSubscriptionEndDate($date);

}