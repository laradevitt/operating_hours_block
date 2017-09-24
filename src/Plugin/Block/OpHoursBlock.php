<?php

namespace Drupal\operating_hours_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'OpHoursBlock' block.
 *
 * @Block(
 *  id = "op_hours_block",
 *  admin_label = @Translation("Hours"),
 * )
 */
class OpHoursBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
         'monday' => $this->t('Closed'),
         'tuesday' => $this->t('11 am-8 pm'),
         'wednesday' => $this->t('11 am-8 pm'),
         'thursday' => $this->t('11 am-5 pm'),
         'friday' => $this->t('11 am-5 pm'),
         'saturday' => $this->t('10 am-5 pm'),
         'sunday' => $this->t('10 am-5 pm'),
        ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['monday'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Monday'),
      '#description' => $this->t(''),
      '#default_value' => $this->configuration['monday'],
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '1',
    ];
    $form['tuesday'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Tuesday'),
      '#description' => $this->t(''),
      '#default_value' => $this->configuration['tuesday'],
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '2',
    ];
    $form['wednesday'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Wednesday'),
      '#description' => $this->t(''),
      '#default_value' => $this->configuration['wednesday'],
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '3',
    ];
    $form['thursday'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Thursday'),
      '#description' => $this->t(''),
      '#default_value' => $this->configuration['thursday'],
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '4',
    ];
    $form['friday'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Friday'),
      '#description' => $this->t(''),
      '#default_value' => $this->configuration['friday'],
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '5',
    ];
    $form['saturday'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Saturday'),
      '#description' => $this->t(''),
      '#default_value' => $this->configuration['saturday'],
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '6',
    ];
    $form['sunday'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Sunday'),
      '#description' => $this->t(''),
      '#default_value' => $this->configuration['sunday'],
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '7',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['monday'] = $form_state->getValue('monday');
    $this->configuration['tuesday'] = $form_state->getValue('tuesday');
    $this->configuration['wednesday'] = $form_state->getValue('wednesday');
    $this->configuration['thursday'] = $form_state->getValue('thursday');
    $this->configuration['friday'] = $form_state->getValue('friday');
    $this->configuration['saturday'] = $form_state->getValue('saturday');
    $this->configuration['sunday'] = $form_state->getValue('sunday');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {

    $days = [];
    $days['monday']['#markup'] = strtolower($this->configuration['monday']);
    $days['tuesday']['#markup'] = strtolower($this->configuration['tuesday']);
    $days['wednesday']['#markup'] = strtolower($this->configuration['wednesday']);
    $days['thursday']['#markup'] = strtolower($this->configuration['thursday']);
    $days['friday']['#markup'] = strtolower($this->configuration['friday']);
    $days['saturday']['#markup'] = strtolower($this->configuration['saturday']);
    $days['sunday']['#markup'] = strtolower($this->configuration['sunday']);

    $build = array(
      '#days' => $days,
      '#theme' => 'operating_hours_block',
      '#attached' => array(
        'drupalSettings' => [
          'operating_hours_block' => [
            'opHoursBlock' => [
              'days' => $days
            ]
          ]
        ],
        'library' => ['operating_hours_block/operating-hours-block'],
      ),
    );

    return $build;
  }

}
