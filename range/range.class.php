<?php
    class PerchFieldType_range extends PerchFieldType
    {
        public function render_inputs($details = array())
        {
            $id = $this->Tag->id();
            $input_id = $this->Tag->input_id();
            $min = $this->Tag->min();
            $max = $this->Tag->max();

            if (!isset($id)) return;

            if (!isset($min) || $details[$min] == "") {
                $min = "0";
            }

            if (!isset($max) || $details[$max] == "") {
                $max = "100";
            }

            return $this->range_slider(
                $input_id,
                $this->Form->get($details, $id, $this->Tag->default(), $this->Tag->post_prefix()),
                $min,
                $max
            );
        }

        public function range_slider($id, $value = '', $min = "0", $max = "100", $class = false)
        {
            if (!$class) {
                $class = 'input-simple m';
            }

            return "<span>" . $min . "</span>"
                . "<input type=\"range\" id=\""
                . $id
                . "\" name=\""
                . $id
                . "\" value=\""
                . $value
                . "\" class=\""
                . $type
                . " "
                . $class
                . "\" min=\""
                . $min
                . "\" max=\""
                . $max
                . "\">"
                . "<span>" . $max . "</span>";
        }
    }
