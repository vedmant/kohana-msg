# Msg

A flash messaging system for Kohana v3.3 and higher.

To use, download the source, extract and rename to message. Move that folder into your modules directory and activate in your bootstrap.

## Usage
To set a flash message all it takes is the following

Msg::set( _type_, _message_ );

## Wrapper methods
There are also methods that are wrappers for the different types of messages
	Msg::error(_message_)
	Msg::success(_message_)
	Msg::notice(_message_)
	Msg::warn(_message_)

_type_: Use a constant that can be found below   
_message_:  A message string or array of message strings

When you need to get a message you can:
	echo Msg::display(); or
	echo Msg::render();

## Messages

There are 4 constants you can use to set a message

	Msg::ERROR = 'error'
	Msg::NOTICE = 'notice'
	Msg::SUCCESS = 'success'
	Msg::WARN = 'warn'

## Style
The message class produces the following code by default
	<ul id="message" class"_type_">
		<li>_Message_</li>
		... Repeated if an array
	</ul>

To style, set #message and the classes for the constants
.error, .success, .notice, .warn

-----

### Sample Usage

I get the most mileage from this class when validating forms. Here is a quick example.

	$validation = new Validate($_POST);
	$validation->rule(.....) <-- Add rules

	if( $validation->check() )
	{
		// Validation passed
		Msg::success('Form Success!');
		// OR -> Msg::set(Msg::SUCCESS, 'Form Success!');
	}
	else
	{
		// Validation failed
		Msg::error($validation->errors('_form_');
		// OR -> Msg::set(Msg::ERROR, $validation->errors('_form_'));
	}
