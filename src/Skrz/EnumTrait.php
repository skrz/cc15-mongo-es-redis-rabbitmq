<?php
namespace Skrz;

trait EnumTrait
{

	/**
	 * @var EnumInterface
	 */
	private static $instance;

	/**
	 * @var int[]
	 */
	private static $ordinals;

	/**
	 * @var mixed[]
	 */
	private static $values;

	/**
	 * @var mixed[]
	 */
	private static $valuesLowercase;

	/**
	 * @var string[]
	 */
	private static $keys;

	/**
	 * @var string[]
	 */
	private static $keysLowercase;

	/**
	 * @return EnumInterface
	 */
	public static function getInstance()
	{
		if (!static::$instance) {
			static::$instance = new static();
		}
		return static::$instance;
	}

	/**
	 * @return mixed[]
	 */
	public static function values()
	{
		if (self::$values === null) {
			$rc = new \ReflectionClass(self::getInstance());
			self::$ordinals = [];
			self::$values = [];
			self::$valuesLowercase = [];

			$ordinal = 0;
			foreach ($rc->getConstants() as $key => $value) {
				self::$ordinals[$value] = $ordinal++;
				if ($value !== null) {
					self::$values[$key] = $value;
					self::$valuesLowercase[strtolower($key)] = $value;
				}
			}

			self::$keys = array_flip(self::$values);
			self::$keysLowercase = array_flip(self::$valuesLowercase);
		}

		return self::$values;
	}

	/**
	 * @param mixed $value
	 * @return int
	 * @throw InvalidArgumentException
	 */
	public static function ordinal($value)
	{
		self::values();
		if (isset(self::$ordinals[$value])) {
			return self::$ordinals[$value];
		} else {
			throw new \InvalidArgumentException("Enum does not contain value '{$value}'.");
		}
	}

	/**
	 * @param string $key
	 * @return mixed
	 * @throw InvalidArgumentException
	 */
	public static function fromString($key)
	{
		self::values();

		if (isset(self::$values[$key])) {
			return self::$values[$key];
		} elseif (isset(self::$valuesLowercase[strtolower($key)])) {
			return self::$valuesLowercase[strtolower($key)];
		} else {
			throw new \InvalidArgumentException("Enum does not contain value for '{$key}'.");
		}
	}

	/**
	 * @param string $value
	 * @return mixed
	 * @throw InvalidArgumentException
	 */
	public static function toString($value)
	{
		self::values();

		if (isset(self::$values[$value])) {
			return self::$values[$value];
		} else {
			throw new \InvalidArgumentException("Enum does not contain key for '{$value}'.");
		}
	}

	/**
	 * @param string $value
	 * @return mixed
	 * @throw InvalidArgumentException
	 */
	public static function toStringLowercase($value)
	{
		self::values();

		if (isset(self::$valuesLowercase[$value])) {
			return self::$valuesLowercase[$value];
		} else {
			throw new \InvalidArgumentException("Enum does not contain key for '{$value}'.");
		}
	}

}
