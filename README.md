# Setup
* Download and save the theme folder in wp-content/themes/
* Download and activate the plugin [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/)
  * After activating the plugin, from the main Wordpress admin panel go to 'Custom Fields' (located on the right-most panel)
  * Select 'Add New' at the top (should be next to 'Field Groups')
  * Enter the title in the format of 'Sub-menu Items X', where X is a number from 1 through 7. You will be repeating the steps below 7 times to make 7 different field groups.
  * Under 'Location', set the rules to be "Show this field group if 'Page Template' 'is equal to' 'submenu-page'
  * Press the 'Add Field' button add the following fields. X is a number from 1 through 7.
    * Field Label: Sub-menu Title X, Field Name: sub-menu_title_X, Field Type: Text, Field Instructions: Enter the title of the sub-menu
    * Field Label: Sub-menu Excerpt X, Field Name: sub-menu_excerpt_X, Field Type: Text, Field Instructions: Enter a brief (1 sentence) description of the sub-menu
    * Field Label: Sub-menu Link X, Field Name: sub-menu_link_X, Field Type: Text, Field Instructions: Enter the URL.
