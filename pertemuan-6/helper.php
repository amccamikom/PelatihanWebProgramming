<?php

/**
 * Validasi sederhana keberadaan key dalam array.
 *
 * @param  array  $array  Array yang akan di validasi
 * @param  array  $keys  Key yang diharapkan ada di array
 * @return array  Key yang tidak ada di array
 */
function validate_array_keys(array $array, array $keys) {
    foreach ($keys as $key) {
        if (! array_key_exists($key, $array)) {
            $error[] = $key;
        }
    }

    return $error ?? [];
}