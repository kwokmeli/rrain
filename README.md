## Setup
* Download and save the theme folder in wp-content/themes/
* Download and activate the plugin [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/)
  * After activating the plugin, from the main Wordpress admin panel go to 'Custom Fields' (located on the right-most panel)
  * Select 'Add New' at the top (should be next to 'Field Groups')
  * Enter the title in the format of 'Sub-menu Items X', where X is a number from 1 through 7. You will be repeating the steps below 7 times to make 7 different field groups.
  * Under 'Location', set the rules to be "Show this field group if 'Page Template' 'is equal to'" 'submenu-page'
  * Press the 'Add Field' button add the following fields. X is a number from 1 through 7.
    * Field Label: Sub-menu Title X, Field Name: sub-menu_title_X, Field Type: Text, Field Instructions: Enter the title of the sub-menu
    * Field Label: Sub-menu Excerpt X, Field Name: sub-menu_excerpt_X, Field Type: Text, Field Instructions: Enter a brief (1 sentence) description of the sub-menu
    * Field Label: Sub-menu Link X, Field Name: sub-menu_link_X, Field Type: Text, Field Instructions: Enter the URL.

## Adding Content
### Homepage
#### Editing the Titles
The titles (e.g. WA Weather Alerts, WA Traffic Map, etc.) are added by adding new posts. To add/delete/edit the listed titles, go to your Posts. Posts are automatically listed in reverse-chronological order, so to ensure that the homepage displays your posts in the correct order, create the bottom posts first.

To add icons to the post titles, go to 'Edit Post' and add a thumbnail for the 'Featured Image'. Images should be resized to a height of 40px (Wordpress will scale the dimensions for you automatically).

To choose where the post title links to, go to 'Edit Post' and under the 'Custom Fields' entry box, change the 'Name' to 'external_url' and paste the URL in the 'Value' box.

### Sub-menu Pages (e.g. Fire Resources)
Sub-menu pages (e.g. Fire Resources, Infectious Diseases, etc.) are created by making new pages. To make a new sub-menu page, create a new page and select 'submenu-page' as the template under 'Page Attributes'. Enter the title, excerpt, and link information for all the sub-menu items you wish to enter. If you aren't using all 7, just leave the unused sections blank.

### About Page
To add an About page, go to Pages and select 'about-page' as the template under 'Page Attributes'. Content for this page can be manually entered in through the content box provided within 'Edit Page' on Wordpress.

### CEMP Page
To add a page whose layout looks like that of the CEMP page, go to Pages and select 'cemp-v1-page' as the template under 'Page Attributes'. Content for this page can be manually entered in through the content box provided within 'Edit Page' on Wordpress.
