(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.OperatingHoursBlock = {
    attach: function (context, settings) {

      // We are using JS to select the day so it doesn't get caught in cache.
      var days = drupalSettings.operating_hours_block.opHoursBlock.days;
      var today = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'][(new Date()).getDay()];
      var hours = days[today.toLowerCase()]['#markup'];

      if (typeof hours !== 'undefined') {
        $('#operating-hours-today').text('Today: ' + hours);
      }
    }
  }
})(jQuery, Drupal, drupalSettings);