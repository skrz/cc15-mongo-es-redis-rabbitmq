<?php
namespace CC15\Entity;

use Skrz\EnumInterface;
use Skrz\EnumTrait;

final class ProductExtraMessageEnum implements EnumInterface
{

	use EnumTrait;

	const EXTENDED_WARRANTY = "EXTENDED_WARRANTY";

	const FREE_ACCESSORIES = "FREE_ACCESSORIES";

	const FREE_CASE = "FREE_CASE";

	const FREE_DELIVERY = "FREE_DELIVERY";

	const FREE_GIFT = "FREE_GIFT";

	const FREE_INSTALLATION = "FREE_INSTALLATION";

	const FREE_STORE_PICKUP = "FREE_STORE_PICKUP";

	const VOUCHER = "VOUCHER";

	public static function fromXML($xmlExtraMessage)
	{
		$extraMessage = strtoupper($xmlExtraMessage);

		if (!in_array($extraMessage, self::values())) {
			throw new \InvalidArgumentException("Bad EXTRA_MESSAGE '{$xmlExtraMessage}'.");
		}

		return $extraMessage;
	}

}
