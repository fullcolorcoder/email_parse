<?php

namespace Drupal\email_import\Controller;
use Drupal\Core\Controller\ControllerBase;
use PhpMimeMailParser\Parser;

/**
 * Defines HelloController class.
 */
class emailParse extends ControllerBase {

  /**
   * Parser initial functionality.
   *
   * @return array
   *   Return markup array.
   */
  public function init() {
    $path = drupal_get_path('module', 'email_import') . '/data/confirmation.eml';
    $parser = new Parser();
    $parser->setPath($path);

    return $parser;
  }

  /**
   * Airline markup.
   *
   * @return array
   *   Return markup array.
   */
  public function airline() {
    $parser = $this->init();
    $email = $parser->getMessageBody('html');
    $airline = $parser->getHeader('from');

    return [
      '#type' => 'markup',
      '#markup' => $this->t($airline),
    ];
  }

  /**
   * Passenger first name markup.
   *
   * @return array
   *   Return markup array.
   */
  public function firstName() {
    $parser = $this->init();
    $email = $parser->getMessageBody('html');
    $nameString = strstr($email, 'firstName');
    $infoArr = explode('=', $nameString);
    $firstName = explode('&', $infoArr[1]);

    return [
      '#type' => 'markup',
      '#markup' => $this->t($firstName[0]),
    ];
  }

  /**
   * Passenger last name markup.
   *
   * @return array
   *   Return markup array.
   */
  public function lastName() {
    $parser = $this->init();
    $email = $parser->getMessageBody('html');
    $nameString = strstr($email, 'firstName');
    $infoArr = explode('=', $nameString);
    $lastName = explode('&', $infoArr[2]);

    return [
      '#type' => 'markup',
      '#markup' => $this->t($lastName[0]),
    ];
  }

  /**
   * Record locator markup.
   *
   * @return array
   *   Return markup array.
   */
  public function recordLocator() {
    $parser = $this->init();
    $email = $parser->getMessageBody('html');
    $nameString = strstr($email, 'firstName');
    $infoArr = explode('=', $nameString);
    $recordLocator = explode('&', $infoArr[3]);

    return [
      '#type' => 'markup',
      '#markup' => $this->t($recordLocator[0]),
    ];
  }

}
