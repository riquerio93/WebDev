<?php
//90% of file taken from bookapps ch15 register long validate.php CBA entire thing from scratch.

class Validate {
    private $fields;

    public function __construct() {
        $this->fields = new Fields();
    }

    public function getFields() {
        return $this->fields;
    }

    // Validate a generic text field and return the Field object
    public function text($name, $value, $min = 1, $max = 255, $required = true) {

        // Get Field object and set its value
        $field = $this->fields->getField($name);
        $field->setValue($value);
        
        // Check field and set or clear error message
        if ($field->isRequired() && $field->isEmpty()) {
            $field->setErrorMessage('Required.');
        } else if (strlen($value) < $min && !$field->isEmpty()) {
            $field->setErrorMessage('Too short.');
        } else if (strlen($value) > $max) {
            $field->setErrorMessage('Too long.');
        } else {
            $field->clearErrorMessage();
        }
        
        return $field;
    }

    // Validate a field with a generic pattern
    public function pattern($name, $value, $pattern, $message) {
        // Get Field object and do text field check
        $field = $this->text($name, $value);

        // if OK after text field check, move on to pattern check
        if (!$field->hasError() && !$field->isEmpty()) {
            $match = preg_match($pattern, $value);
            if ($match === FALSE) {
                $field->setErrorMessage('Error testing field.');
            } else if ( $match != 1 ) {
                $field->setErrorMessage($message);
            } else {
                $field->clearErrorMessage();
            }
        }
    }

    public function phone($name, $value) {
        // Get Field object and do text field check
        $field = $this->text($name, $value);

        // if OK after text field check, move on to phone check
        if (!$field->hasError() && !$field->isEmpty()) {
            // Call the pattern method to validate a phone number
            $pattern = '/^[[:digit:]]{3}-[[:digit:]]{3}-[[:digit:]]{4}$/';
            $message = 'Invalid phone number, use 999-999-9999.';
            $this->pattern($name, $value, $pattern, $message);
        }
    }

    public function email($name, $value) {
        // Get Field object and do text field check
        $field = $this->text($name, $value);

        // if OK after text field check, move on to email check
        if (!$field->hasError() && !$field->isEmpty()) {
            if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $field->clearErrorMessage();
            } else {
                $field->setErrorMessage("Invalid email address.");
            }
        }
    }

    public function password($name, $password) {
        // Get Field object and do text field check
        $field = $this->text($name, $password, 6);  // minimum 6 characters

        // if OK after text field check, move on to password check
        if (!$field->hasError() && !$field->isEmpty()) {

            // Patterns to validate password
            $pattern = "/^(?=.*[[:digit:]])(?=.*[[:upper:]])(?=.*[[:lower:]])";
            $pattern .= "(?=.*[_-])[[:digit:][:upper:][:lower:]_-]{6,}$/";
            $message = 'Must have one each of upper, lower, digit, and "-_".';
            $this->pattern($name, $password, $pattern, $message);
        }
    }

    public function state($name, $value) {
        // Get Field object and do text field check
        $field = $this->text($name, $value);

        // if OK after text field check, move on to state check
        if (!$field->hasError() && !$field->isEmpty()) {
            $states = [
                'AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'DC',
                'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY',
                'LA', 'ME', 'MA', 'MD', 'MI', 'MN', 'MS', 'MO', 'MT',
                'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'OH',
                'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT',
                'VT', 'VA', 'WA', 'WV', 'WI', 'WY'
            ];
            $stateString = implode('|', $states);
            $pattern = '/^(' . $stateString . ')$/';
            $this->pattern($name, $value, $pattern, 'Invalid state.');
        }
    }

    public function postalCode($name, $value) {
        // Get Field object and do text field check
        $field = $this->text($name, $value);

        // if OK after text field check, move on to zip check
        if (!$field->hasError() && !$field->isEmpty()) {
            $pattern = '/^[[:digit:]]{5}(-[[:digit:]]{4})?$/';
            $message = 'Invalid zip code.';
            $this->pattern($name, $value, $pattern, $message);
        }
    }
}
?>