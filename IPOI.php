<?php

	/**
	 * Describes a contract for a Wikitude-ARML-Placemark
	 * @author Thomas Krammer - www.powerhour.at
	 * @version 1.1
	 *
	 */
	interface PowerHour_Wikitude_IPOI
	{

		/**
		 * @return string $id Identifies a point of interest. Is used to update POIs when uploaded via Wikitude.me
		 */
		public function getId();

		/**
		 * @return string $provider Reference to the content provider definition.
		 */
		public function getProvider() ;

		/**
		 * @return $name Name of the POI. Displayed as POI title.
		 */
		public function getName();

		/**
		 * @return $description Description of the POI. Currently no HTML formatting is allowed.
		 */
		public function getDescription();

		/**
		 * @return $thumbnail Additional information about a POI that is displayed in the bubble.
		 */
		public function getThumbnail();

		/**
		 * @return $phone When a phone number is given, Wikitude displays a "call me" button in the bubble. You can directly call the person/organization behind the POI. E.g. call a restaurant to reserve a table for dinner.
		 */
		public function getPhone();

		/**
		 * @return $url Link to a web page that contains additional information about the POI.
		 */
		public function getUrl();

		/**
		 * @return $email Write the person/organization an email directly from Wikitude.
		 */
		public function getEmail();

		/**
		 * @return $address Address of the POI. Also used to route to the location of the POI.
		 */
		public function getAddress();

		/**
		 * @return array<PowerHour_Wikitude_Attachment> Can be a link to a resource (image, PDF file, ...). You could use this to issue coupons or vouchers for potential clients that found you via Wikitude.
		 */
		//public function getAttachments();

		/**
		 * @return string The coordinates are entered in the format longitude, latitude, altitude. Altitude is optional. Altitude must be given in meters.
		 */
		public function getCoordinates();

	}