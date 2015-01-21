<?php

require_once(dirname(__FILE__) . '/../simpletest/reporter.php');

class MyDisplay extends HtmlReporter {

    function __construct($character_set = 'ISO-8859-1') {
        parent::__construct($character_set);
    }

    function paintPass($message) {
        parent::paintPass($message);
        print "<tr>";
        print '<td style="background-color:green;font-weight: 900;">Pass</td>';
        $this->displayMessage($message);
        print "<tr>";
    }

    function paintFail($message) {
        parent::paintFail($message);
        print "<tr>";
        print '<td style="background-color:red;font-weight: 900;">Fail</td>';
        $this->displayMessage($message);
        print "<tr>";
    }

    function paintHeader($test_name) {
        print '<br /><br />';
        print '<table class="table tableDnD" cellspacing="0" cellpadding="0" style="width:100%;">';
        print '<thead>';
        print "<tr>";
        print "<th>State</th>";
        print "<th>Project</th>";
        print "<th>Method</th>";
        print "<th>Message</th>";
        print "</tr>";
        print "</thead>";
        print "<tbody>";
    }

    function paintFooter($test_name) {
        print "</tbody>";
        print "</table>";
        $colour = ($this->getFailCount() + $this->getExceptionCount() > 0 ? "red" : "green");
        print '<div style="padding: 8px; margin-top: 1em; background-color: ' . $colour . '; color: white;">';
        print $this->getTestCaseProgress() . "/" . $this->getTestCaseCount();
        print " test cases complete:\n";
        print "<strong>" . $this->getPassCount() . "</strong> passes, ";
        print "<strong>" . $this->getFailCount() . "</strong> fails and ";
        print "<strong>" . $this->getExceptionCount() . "</strong> exceptions.";
        print "</div>\n";
    }

    /**
     *
     * @param type $sMessage
     */
    private function displayMessage($sMessage) {
        $breadcrumb = $this->getTestList();
        array_shift($breadcrumb);
        print "<td>" . $breadcrumb[0] . "</td>";
        print "<td>" . $breadcrumb[1] . "</td>";
        print "<td>$sMessage</td>";
    }

}
