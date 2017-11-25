
<?php
/**
 * We just want to hash our password using the current DEFAULT algorithm.
 * This is presently BCRYPT, and will produce a 60 character result.
 *
 * Beware that DEFAULT may change over time, so you would want to prepare
 * By allowing your storage to expand past 60 characters (255 would be good)
 */
echo password_hash("$2y$10$1YoaJkSIWMDkYJzZrlxD..wmv37uEFP4yMgD581L4Q.v.ZkD4LBva", PASSWORD_DEFAULT);
?>
