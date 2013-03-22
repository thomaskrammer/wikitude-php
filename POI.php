<?php

	/**
	 * Class to represents a Wikitude-ARML-Placemark
	 * @author Thomas Krammer - www.powerhour.at
	 * @version 1.1
	 *
	 */
	class PowerHour_Wikitude_POI implements PowerHour_Wikitude_IPOI
	{

		protected $id = 0;
		protected $provider = "";
		protected $name = "";
		protected $description = "";
		protected $thumbnail = "";
		protected $phone = "";
		protected $url = "";
		protected $email = "";
		protected $address = "";
		protected $attachments = array();
		protected $longitude = 0.0;
		protected $latitude = 0.0;
		protected $altitude = 0;


		public function __construct($provider, $name)
		{
			$this->provider = $provider;
			$this->name = $name;
		}

		public function getId()
		{
			return $this->id;
		}

		/**
		 * @param mixed $id Identifies a point of interest. Is used to update POIs when uploaded via Wikitude.me
		 */
		public function setId($id)
		{
			$this->id = $id;
		}

		/**
		 * @return the $provider
		 */
		public function getProvider() {
			return $this->provider;
		}

		/**
		 * @param $provider Reference to the content provider definition.
		 */
		public function setProvider($provider) {
			$this->provider = $provider;
		}

		/**
		 * @return the $name
		 */
		public function getName() {
			return $this->name;
		}

		/**
		 * @return the $description
		 */
		public function getDescription() {
			return $this->description;
		}

			/**
		 * @return the $thumbnail
		 */
		public function getThumbnail() {
			return $this->thumbnail;
		}

			/**
		 * @return the $phone
		 */
		public function getPhone() {
			return $this->phone;
		}

			/**
		 * @return the $url
		 */
		public function getUrl() {
			return $this->url;
		}

			/**
		 * @return the $email
		 */
		public function getEmail() {
			return $this->email;
		}

			/**
		 * @return the $address
		 */
		public function getAddress() {
			return $this->address;
		}

			/**
		 * @return the $attachments
		 */
		public function getAttachments() {
			return $this->attachments;
		}

			/**
		 * @return the $longitude
		 */
		public function getLongitude() {
			return $this->longitude;
		}

			/**
		 * @return the $latitude
		 */
		public function getLatitude() {
			return $this->latitude;
		}

			/**
		 * @return the $altitude
		 */
		public function getAltitude() {
			return $this->altitude;
		}

		/**
		 * @param $name Name of the POI. Displayed as POI title.
		 */
		public function setName($name) {
			$this->name = $name;
		}

		/**
		 * @param $description Description of the POI. Currently no HTML formatting is allowed.
		 */
		public function setDescription($description) {
			$this->description = $description;
		}

		/**
		 * @param $thumbnail Additional information about a POI that is displayed in the bubble.
		 */
		public function setThumbnail($thumbnail) {
			$this->thumbnail = $thumbnail;
		}

		/**
		 * @param $phone When a phone number is given, Wikitude displays a "call me" button in the bubble. You can directly call the person/organization behind the POI. E.g. call a restaurant to reserve a table for dinner.
		 */
		public function setPhone($phone) {
			$this->phone = $phone;
		}

		/**
		 * @param $url Link to a web page that contains additional information about the POI.
		 */
		public function setUrl($url) {
			$this->url = $url;
		}

		/**
		 * @param $email Write the person/organization an email directly from Wikitude.
		 */
		public function setEmail($email) {
			$this->email = $email;
		}

		/**
		 * @param $address Address of the POI. Also used to route to the location of the POI.
		 */
		public function setAddress($address) {
			$this->address = $address;
		}

		/**
		 * @param PowerHour_Wikitude_Attachment $attachment
		 */
		public function addAttachment(PowerHour_Wikitude_Attachment $attachment) {
			$this->attachments[] = $attachment;
		}

		/**
		 * @param $longitude the $longitude to set
		 */
		public function setLongitude($longitude) {
			$this->longitude = $longitude;
		}

			/**
		 * @param $latitude the $latitude to set
		 */
		public function setLatitude($latitude) {
			$this->latitude = $latitude;
		}

			/**
		 * @param $altitude the $altitude to set
		 */
		public function setAltitude($altitude) {
			$this->altitude = $altitude;
		}

		/**
		 * @return string The coordinates are entered in the format longitude, latitude, altitude. Altitude is optional. Altitude must be given in meters.
		 */
		public function getCoordinates()
		{
			return $this->longitude.",".$this->latitude.",".$this->altitude;
		}


	}