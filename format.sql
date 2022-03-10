UPDATE
    `users`
SET
    `firstName` = '$firstName',
    `lastName` = '$lastName',
    `email` = '$email',
    `tel` = '$tel'
WHERE
    id = '$id'