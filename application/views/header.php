<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>RIDEHIRE &dash; LOGIN</title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>"/>

    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

</head>
<body id="page-top">
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>">RIDEHIRE</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav hidden-lg hidden-md navbar-nav navbar-right">
                <li>
                    <a href="<?php echo base_url('sign_in'); ?>">Sign in</a>
                </li>
                <li>
                    <a href="<?php echo base_url('sign_up'); ?>">Sign up</a>
                </li>
            </ul>
        </div>
    </div>
</div>