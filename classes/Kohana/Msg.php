<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Msg is a class that lets you easily send messages
 * in your application (aka Flash Messages)
 *
 * @package    Message
 * @author     Vemdant <vedmant@gmail.com>
 */
class Kohana_Msg
{
	/**
	 * @var  string    The default view if one isn't passed into display/render.
	 */
	public static $default = "messages/bootstrap";

	/**
	 * Constants to use for the types of messages that can be set.
	 */
	const ERROR = 'danger';
	const NOTICE = 'info';
	const SUCCESS = 'success';
	const WARNING = 'warning';

	/**
	 * Displays the message.
	 *
	 * @param    string    Name of the view
	 * @return   string    Message to string
	 */
	public static function display($view = null)
	{
		if($messages = self::get())
		{
			if($view === null)
				$view = self::$default;

			self::clear();

			return View::factory($view)->set('messages', $messages)->render();
		}
	}

	/**
	 * The same as display - used to mold to Kohana standards.
	 *
	 * @param    string    Name of the view
	 * @return   string    HTML for message
	 */
	public static function render($view = null)
	{
		return self::display($view);
	}

	/**
	 * Gets the current message.
	 *
	 * @return   mixed    The message or FALSE
	 */
	public static function get()
	{
		return Session::instance()->get('messages', array());
	}

	/**
	 * Sets a message.
	 *
	 * @param   string   Type of message
	 * @param   mixed    Array/String for the message
	 */
	public static function set($type, $message)
	{
		if($message === '') return;

		$session_msgs = self::get();

		if( ! isset($session_msgs[$type])) $session_msgs[$type] = array();

		if(is_array($message)){
			$session_msgs[$type] = array_merge($session_msgs[$type], $message);
		}else{
			$session_msgs[$type][] = $message;
		}

		Session::instance()->set('messages', $session_msgs);
	}

	/**
	 * Clears the messages from the session.
	 */
	public static function clear()
	{
		Session::instance()->delete('messages');
	}

	/**
	 * Sets an error message.
	 *
	 * @param    mixed    String/Array for the message(s)
	 */
	public static function error($message)
	{
		self::set(self::ERROR, $message);
	}

	/**
	 * Sets a notice.
	 *
	 * @param    mixed    String/Array for the message(s)
	 */
	public static function info($message)
	{
		self::set(self::NOTICE, $message);
	}

	/**
	 * Sets a success message.
	 *
	 * @param    mixed    String/Array for the message(s)
	 */
	public static function success($message)
	{
		self::set(self::SUCCESS, $message);
	}

	/**
	 * Sets a warning message.
	 *
	 * @param    mixed    String/Array for the message(s)
	 */
	public static function warning($message)
	{
		self::set(self::WARNING, $message);
	}

}
