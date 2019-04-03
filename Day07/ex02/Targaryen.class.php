<?php
Class Targaryen {

    public function resistsFire() {
		return False;
	}
    public function getBurned() {
        if ($this->resistsFire() === True) { // === is same type == just same content
            return ('emerges naked but unharmed');
        } else {
            return ('burns alive' ); // must return if we print it reverse the order.. 
        }
    }
}
?>