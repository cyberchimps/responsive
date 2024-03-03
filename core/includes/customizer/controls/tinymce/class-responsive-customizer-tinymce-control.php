<?php

function enqueue_responsive_tinymce_stylesheet() {
  wp_enqueue_style('responsive-tinymce-stylesheet', RESPONSIVE_THEME_URI . 'core/includes/customizer/controls/tinymce/tinymce.css');
}
add_action('customize_controls_print_styles', 'enqueue_responsive_tinymce_stylesheet');

if (class_exists('WP_Customize_Control')) {
  class Responsive_Customizer_Tinymce_Control extends WP_Customize_Control {

    public function __construct($manager, $id, $options) {
      parent::__construct($manager, $id, $options);

      global $num_customizer_teenies_initiated;
      $num_customizer_teenies_initiated = empty($num_customizer_teenies_initiated)
        ? 1
        : $num_customizer_teenies_initiated + 1;
    }

    protected function render_content() {
      global $num_customizer_teenies_initiated, $num_customizer_teenies_rendered;
      $num_customizer_teenies_rendered = empty($num_customizer_teenies_rendered)
          ? 1
          : $num_customizer_teenies_rendered + 1;

      $value = $this->value() ? $this->value() : 'Copyright [copyright] [current_year] [site_title] | Powered by [theme_author]';
      $dropdown_options = array(
          'Copyright' => '[copyright]',
          'Year' => '[current_year]',
          'Title' => '[site_title]',
          'Author' => '[theme_author]',
      );

      ?>
      <label class="customize-control-tinymce" >
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        <label>
          <div class="customize-control-tags">
          <span>Tags</span>
            <select id="<?php echo esc_attr($this->id) ?>-dropdown" <?php $this->link(); ?>>
            <option value='' disabled></option>
                <?php
                foreach ($dropdown_options as $label => $option_value) {
                    $selected = selected($value, $option_value, false);
                    echo "<option value='" . esc_attr( $option_value ) . "' " . esc_attr( $selected ) . ">$label</option>";
                }
                ?>
            </select>
          </div>
        <label>
          <input id="<?php echo esc_attr($this->id) ?>-link" class="wp-editor-area" type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea($value); ?>">
          <?php
          wp_editor($value, $this->id, array(
              'textarea_name'      => $this->id,
              'media_buttons'      => false,
              'drag_drop_upload'   => false,
              'teeny'              => true,
              'quicktags'          => false,
              'textarea_rows'      => 5,
              'wpautop' => false,
          ));
        ?>
      </label>
      <script>
        function updateContent() {
          var editor = tinymce.get('<?php echo esc_attr($this->id); ?>');
          var content = editor.getContent();
          var ajaxUrl = '<?php echo esc_url(admin_url('admin-ajax.php')); ?>';

          fetch(ajaxUrl, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
              action: 'save_footer_text',
              footer_text: content,
            }),
          });
        }

        tinymce.init({
          selector: '#<?php echo esc_attr($this->id); ?>',
          toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
          menubar: false,
          setup: function (editor) {
            editor.on('BeforeSetContent', function (event) {
              event.content = event.content.replace(/<p>|<\/p>/g, '');
            });

            var linkInput = document.getElementById('<?php echo esc_attr($this->id); ?>-link');
            var dropdown = document.getElementById('<?php echo esc_attr($this->id); ?>-dropdown');

            linkInput.value = editor.getContent();
            editor.setContent(linkInput.value);

            dropdown.addEventListener('change', function () {
              var selectedOption = dropdown.options[dropdown.selectedIndex];
              if (selectedOption.value) {
                var newContent = editor.getContent() + ' ' + selectedOption.value;
                linkInput.value = newContent;
                editor.setContent(linkInput.value);
                dropdown.selectedIndex = 0;
                updateContent();
                linkInput.dispatchEvent(new Event('change'));
              }
            });

            var cb = function () {
              var newContent = editor.getContent();
              linkInput.value = newContent;
              updateContent();
              linkInput.dispatchEvent(new Event('change'));
            };

            editor.on('init', cb);
            editor.on('Change', cb);
            editor.on('Undo', cb);
            editor.on('Redo', cb);
            editor.on('KeyUp', cb);
          }
        });
      </script>

      <?php
      if ($num_customizer_teenies_rendered == $num_customizer_teenies_initiated)
        do_action('admin_print_footer_scripts');
    }
  }
}