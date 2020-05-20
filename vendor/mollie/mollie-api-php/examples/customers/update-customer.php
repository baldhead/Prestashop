<?php

namespace _PhpScoper5ea00cc67502b;

/*
 * Updating an existing customer via the Mollie API.
 */

use _PhpScoper5ea00cc67502b\Mollie\Api\Exceptions\ApiException;
use function htmlspecialchars;

try {
    /*
     * Initialize the Mollie API library with your API key or OAuth access token.
     */
    require "../initialize.php";
    /*
     * Retrieve an existing customer by his customerId
     */
    $customer = $mollie->customers->get("cst_cUe8HjeBuz");
    /**
     * Customer fields that can be updated.
     *
     * @See https://docs.mollie.com/reference/v2/customers-api/update-customer
     */
    $customer->name = "Luke Sky";
    $customer->email = "luke@example.org";
    $customer->locale = "en_US";
    $customer->metadata->isJedi = TRUE;
    $customer->update();
    echo "<p>Customer updated: " . htmlspecialchars($customer->name) . "</p>";
} catch (ApiException $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}