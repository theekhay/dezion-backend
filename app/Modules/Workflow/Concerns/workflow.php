<?php

Interface IWorkflow{

    /**
     * function to be ran
     */
    public function execute();

    /**
     * status to update to if the operation was succesful
     */
    public function status_on_completion();

    /**
     * status ti update to if it fails
     */
    public function status_on_failure();

    /**
     * Set the model function to be called
     */
    public function setFunc();

    /**
     * Set the model to be used
     */
    public function setModel();

    /**
     * Set the function to be called if an exception an error or exception is thrown
     */
    public function set_error_fun();

    /**
     * The pre
     */
    public function pre_run();

    /**
     *
     */
    public function post_run();
}
