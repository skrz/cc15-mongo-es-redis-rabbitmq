<?php
namespace CC15\Entity;

use Skrz\EnumInterface;
use Skrz\EnumTrait;

final class ProductItemTypeEnum implements EnumInterface
{

	use EnumTrait;

	const ITEM_NEW = "NEW"; // const cannot be named NEW, because it's reserved word

	const BAZAR = "BAZAR";

	public static function fromXML($xmlItemType)
	{
		$itemType = strtoupper($xmlItemType);

		if (!in_array($itemType, self::values())) {
			throw new \InvalidArgumentException("Bad ITEM_TYPE '{$xmlItemType}'.");
		}

		return $itemType;
	}

}
