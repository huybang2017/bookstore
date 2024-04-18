<?php
session_start();

if (empty($_SESSION['username'])) {
    echo "have session";
} else {
    echo "no session";
}
