<?php
namespace Skrz;

/**
 * Methods available on enumerations
 *
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 */
interface EnumInterface
{

	/**
	 * Returns all values in this enumeration
	 *
	 * @return string[]
	 */
	public static function values();

	/**
	 * Returns ordinal number of value or -1 if value not found in enum
	 *
	 * @param string $value
	 * @return int
	 */
	public static function ordinal($value);

	/**
	 * @param string $key
	 * @return mixed
	 * @throw InvalidArgumentException
	 */
	public static function fromString($key);

	/**
	 * @param string $value
	 * @return mixed
	 * @throw InvalidArgumentException
	 */
	public static function toString($value);

	/**
	 * @param string $value
	 * @return mixed
	 * @throw InvalidArgumentException
	 */
	public static function toStringLowercase($value);

}
