<?php

$query = "SELECT receipt_rule.Ref_No as id,receipt_rule.officer_id, receipt_rule.Date, receipt_rule.time,receipt_rule.Amount, DATE_ADD((receipt_rule.Date),INTERVAL 14 DAY) as due, GROUP_CONCAT(rule.description) FROM ( SELECT * FROM rules_broken rb INNER JOIN fine_receipt ON rb.fine_receipt_id = fine_receipt.Ref_No) as receipt_rule INNER JOIN rule ON receipt_rule.rule_id = rule.rule_id GROUP BY(receipt_rule.Ref_No)";

?>