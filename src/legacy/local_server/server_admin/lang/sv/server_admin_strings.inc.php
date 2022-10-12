<?php
/***********************************************************************/
/** \file   server_admin_strings.inc.php
 * \brief  The strings displayed in the server administration console (Swedish)
 *
 * This file is part of the Basic Meeting List Toolbox (BMLT).
 *
 * Find out more at: https://bmlt.app
 *
 * BMLT is free software: you can redistribute it and/or modify
 * it under the terms of the MIT License.
 *
 * BMLT is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * MIT License for more details.
 *
 * You should have received a copy of the MIT License along with this code.
 * If not, see <https://opensource.org/licenses/MIT>.
 * Swedish translator webmaster2@nasverige.org Magnus */

defined('BMLT_EXEC') or die('Cannot Execute Directly');    // Makes sure that this file is in the correct context.

$comdef_server_admin_strings = array(
    'server_admin_disclosure' => 'Server Administration',
    'server_admin_naws_spreadsheet_label' => 'Updated World Committee Codes Spreadsheet',
    'update_world_ids_button_text' => 'Update World Committee Codes',
    'update_world_ids_from_spreadsheet_dropdown_text' => 'Update World Committee Codes (Group IDs from NAWS) from NAWS Spreadsheet',
    'server_admin_error_no_world_ids_updated' => 'No World IDs were updated. This could be because your user does not have permission to update the submitted meetings.',
    'server_admin_error_required_spreadsheet_column' => 'Required column does not exist in the spreadsheet: ',
    'server_admin_error_bmlt_id_not_integer' => 'The provided bmlt_id is not an integer: ',
    'server_admin_error_could_not_create_reader' => 'Could not create reader for file: ',
    'server_admin_error_no_files_uploaded' => 'No files were uploaded.',
    'server_admin_error_service_bodies_already_exist' => 'Service bodies with the following World IDs already exist: ',
    'server_admin_error_meetings_already_exist' => 'Meetings with the following World IDs already exist: ',
    'server_admin_ui_num_meetings_updated' => 'Number of meetings updated: ',
    'server_admin_ui_num_meetings_not_updated' => 'Number of meetings that did not need updating: ',
    'server_admin_ui_warning' => 'WARNING',
    'server_admin_ui_errors' => 'Error(s)',
    'server_admin_ui_deleted_meetings_marked' => 'Number of deleted meetings marked so that they won\'t appear in future NAWS exports: ',
    'server_admin_ui_problem_meetings' => 'meetings were found in the spreadsheet that couldn\'t be updated. Problem meeting IDs: ',
    'server_admin_ui_service_bodies_created' => 'Service bodies created: ',
    'server_admin_ui_meetings_created' => 'Meetings created: ',
    'server_admin_ui_users_created' => 'Users created: ',
    'server_admin_ui_refresh_ui_text' => 'Sign out and then sign in again to see the new service bodies, users, and meetings.',
    'import_service_bodies_and_meetings_button_text' => 'Import Service Bodies and Meetings',
    'import_service_bodies_and_meetings_dropdown_text' => 'Import Service Bodies and Meetings from NAWS Export',
    'server_admin_naws_import_spreadsheet_label' => 'NAWS Import Spreadsheet:',
    'server_admin_naws_import_initially_publish' => 'Initialize imported meetings to \'published\': ',
    'server_admin_naws_import_explanation' => 'Uncheck the box to initialize imported meetings to \'unpublished\'. (This is useful if many of the new meetings will need to be edited or deleted, and you don\'t want them showing up in the meantime.)',
    'account_disclosure' => 'Mitt konto',
    'account_name_label' => 'Kontonamn:',
    'account_login_label' => 'Min inloggning:',
    'account_type_label' => 'Jag är en:',
    'account_type_1' => 'Server Administratör',
    'account_type_2' => 'Serviceenhet Administratör',
    'ServerMapsURL' => 'https://maps.googleapis.com/maps/api/geocode/xml?address=##SEARCH_STRING##&sensor=false',
    'account_type_4' => 'hacker? tydligen inte...',
    'account_type_5' => 'Serviceenhet övervakare',
    'change_password_label' => 'Ändra mitt lösenord till:',
    'change_password_default_text' => 'Låt denna vara såvida du inte vill byta lösenord',
    'account_email_label' => 'Min Epostadress:',
    'email_address_default_text' => 'Fyll i en Epostadress',
    'account_description_label' => 'Om mig:',
    'account_description_default_text' => 'Fyll i en "om mig" text',
    'account_change_button_text' => 'Ändra mina kontoinställningar',
    'account_change_fader_success_text' => 'Kontoinställningarna ändrades framgångsrikt.',
    'account_change_fader_failure_text' => 'Kontoinställningarna ändrades inte!',
    'meeting_editor_disclosure' => 'Ändra möten',
    'meeting_editor_already_editing_confirm' => 'Du arbetar med ett annat möte. Vill du fortsätta och tappa ev ändringar?',
    'meeting_change_fader_success_text' => 'Mötet ändrades framgångsrikt',
    'meeting_change_fader_failure_text' => 'Mötet ändrades inte!',
    'meeting_change_fader_success_delete_text' => 'Mötet kasserat',
    'meeting_change_fader_fail_delete_text' => 'Mötet kasserades inte!',
    'meeting_change_fader_success_add_text' => 'Nytt möte registrerat',
    'meeting_change_fader_fail_add_text' => 'Det nya mötet registrerades inte!',
    'meeting_text_input_label' => 'Sök efter text:',
    'access_service_body_label' => 'Jag har tillgång till:',
    'meeting_text_input_default_text' => 'Fyll i någon söktext',
    'meeting_text_location_label' => 'Sök efter närmaste möte till en plats',
    'meeting_search_weekdays_label' => 'Sök möten utvalda dagar:',
    'meeting_search_weekdays_names' => array('Alla', 'Söndag', 'Måndag', 'Tisdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lördag'),
    'meeting_search_service_bodies_label' => 'Sök i utvalda servicenheter:',
    'meeting_search_start_time_label' => 'Sök efter mötets starttid:',
    'meeting_search_start_time_all_label' => 'Valfri tid',
    'meeting_search_start_time_morn_label' => 'Morgon',
    'meeting_search_start_time_aft_label' => 'Eftermiddag',
    'meeting_search_start_time_eve_label' => 'Kväll',
    'meeting_search_no_results_text' => 'Inga möten funna.',
    'meeting_editor_tab_specifier_text' => 'Sök efter möten',
    'meeting_editor_tab_editor_text' => 'Ändra möten',   // TODO: change to 'Edit Or Create Meetings'
    'meeting_editor_create_new_text' => 'Skapa ett nytt möte',
    'meeting_editor_location_map_link' => 'Karta',
    'meeting_editor_screen_match_ll_button' => 'Ange longitude och latitud för adressen',
    'meeting_editor_screen_default_text_prompt' => 'Fyll i text eller nummer',
    'meeting_is_published' => 'Mötet är nu publicerat',
    'meeting_unpublished_note' => 'Note: Unpublishing a meeting indicates a temporary closure. If this meeting has closed permanently, please delete it.',
    'meeting_editor_screen_meeting_name_label' => 'Mötets namn:',
    'meeting_editor_screen_meeting_name_prompt' => 'Fyll i mötets namn',
    'meeting_editor_screen_meeting_weekday_label' => 'Veckodag:',
    'meeting_editor_screen_meeting_start_label' => 'Mötets starttid:',
    'meeting_editor_screen_meeting_time_zone_label' => 'Meeting Time Zone:',
    'meeting_editor_screen_meeting_am_label' => 'AM',
    'meeting_editor_screen_meeting_pm_label' => 'PM',
    'meeting_editor_screen_meeting_noon_label' => 'Middag',
    'meeting_editor_screen_meeting_midnight_label' => 'Midnatt',
    'meeting_editor_screen_meeting_duration_label' => 'Varaktighet:',
    'meeting_editor_screen_meeting_oe_label' => 'Osatt sluttid',
    'meeting_editor_screen_meeting_cc_label' => 'Världsservice kod:',
    'meeting_editor_screen_meeting_cc_advice' => 'Normally leave this field alone (see documentation).',  // TODO: translate
    'meeting_editor_screen_meeting_contact_label' => 'Mötets epostkontakt:',
    'meeting_editor_screen_meeting_contact_prompt' => 'Fyll i en epostadress för kontakt and detta möte',
    'meeting_editor_screen_meeting_sb_label' => 'Serviceenhet:',
    'meeting_editor_screen_meeting_sb_default_value' => 'Ingen serviceenhet vald',
    'meeting_editor_screen_meeting_longitude_label' => 'Longitud:',
    'meeting_editor_screen_meeting_longitude_prompt' => 'Fyll i en longitud',
    'meeting_editor_screen_meeting_latitude_label' => 'Latitud:',
    'meeting_editor_screen_meeting_latitude_prompt' => 'fyll i en latitud',
    'meeting_editor_screen_meeting_location_label' => 'plats:',
    'meeting_editor_screen_meeting_location_prompt' => 'Fyll i en plats(ex byggnadens namn)',
    'meeting_editor_screen_meeting_info_label' => 'Extra Info:',
    'meeting_editor_screen_meeting_info_prompt' => 'Fyll i vidare platsinformation',
    'meeting_editor_screen_meeting_street_label' => 'GatuAdress:',
    'meeting_editor_screen_meeting_street_prompt' => 'Fyll i en gatuadress',
    'meeting_editor_screen_meeting_neighborhood_label' => 'Närområde:',
    'meeting_editor_screen_meeting_neighborhood_prompt' => 'Fyll i närområde',
    'meeting_editor_screen_meeting_borough_label' => 'Stadsdel:',
    'meeting_editor_screen_meeting_borough_prompt' => 'Fyll i en stadsdel)',
    'meeting_editor_screen_meeting_city_label' => 'Stad:',
    'meeting_editor_screen_meeting_city_prompt' => 'Fyll i en stad',
    'meeting_editor_screen_meeting_county_label' => 'Land:',
    'meeting_editor_screen_meeting_county_prompt' => 'Fyll i ett land',
    'meeting_editor_screen_meeting_state_label' => 'Län:',
    'meeting_editor_screen_meeting_state_prompt' => 'Fyll i ett län',
    'meeting_editor_screen_meeting_zip_label' => 'Postnummer:',
    'meeting_editor_screen_meeting_zip_prompt' => 'Fyll i postnummer',
    'meeting_editor_screen_meeting_nation_label' => 'Världsdel:',
    'meeting_editor_screen_meeting_nation_prompt' => 'Fyll i en världsdel',
    'meeting_editor_screen_meeting_comments_label' => 'Comments:',
    'meeting_editor_screen_meeting_train_lines_label' => 'Train Lines:',
    'meeting_editor_screen_meeting_bus_lines_label' => 'Bus Lines:',
    'meeting_editor_screen_meeting_phone_meeting_number_label' => 'Phone Meeting Dial-in Number:',
    'meeting_editor_screen_meeting_phone_meeting_number_prompt' => 'Enter the dial-in number for a phone or virtual meeting',
    'meeting_editor_screen_meeting_virtual_meeting_link_label' => 'Virtual Meeting Link:',
    'meeting_editor_screen_meeting_virtual_meeting_link_prompt' => 'Enter the link for a virtual meeting',
    'meeting_editor_screen_meeting_virtual_meeting_additional_info_label' => 'Virtual Meeting Additional Information:',
    'meeting_editor_screen_meeting_virtual_meeting_additional_info_prompt' => 'Enter any additional information for joining the virtual meeting, including directly from the app. For example, if the meeting uses Zoom, "Zoom ID: 456 033 8613, Passcode: 1953" would be appropriate.',
    'meeting_editor_screen_meeting_venue_type' => 'Venue Type:',
    'meeting_editor_screen_meeting_venue_type_inperson' => 'In-Person',
    'meeting_editor_screen_meeting_venue_type_virtual' => 'Virtual',
    'meeting_editor_screen_meeting_venue_type_virtualTC' => 'Virtual (temporarily replacing an in-person)',
    'meeting_editor_screen_meeting_venue_type_hybrid' => 'Hybrid (both in-person and virtual)',
    'meeting_editor_screen_meeting_venue_type_validation' => 'You must select a venue type.',
    'meeting_editor_screen_meeting_virtual_info_missing' => 'Virtual or hybrid meetings must have a Virtual Meeting Link, a Phone Meeting Dial-in Number, or Virtual Meeting Additional Information',
    'meeting_editor_screen_meeting_location_warning' => 'Meeting should have a location (at least a city/town and state/province, or a zip/postal code).',
    'meeting_editor_screen_meeting_address_warning' => 'In-person or hybrid meetings should have a street address.',
    'meeting_editor_screen_meeting_url_validation' => 'Virtual Meeting Link is not a valid URL.',
    'meeting_editor_screen_meeting_url_or_phone_warning' => 'Virtual or hybrid meetings should have either a Virtual Meeting Link or a Phone Meeting Dial-in Number',
    'meeting_editor_screen_meeting_additional_warning' => 'Please also fill in Virtual Meeting Additional Information if there is a Virtual Meeting Link.',
    'meeting_editor_screen_in_person_virtual_info_warning' => 'In-person meetings shouldn\'t have any virtual meeting information.',
    'meeting_editor_screen_meeting_virtual_location_info_warning' => 'Virtual meetings shouldn\'t have a location name or address.',
    'meeting_editor_screen_meeting_validation_warning' => 'There are warnings.  Are you sure you want to save anyway?  If not, press \'cancel\' and go to the Location tab to see the warnings in place and address them.',
    'meeting_editor_screen_meeting_validation_failed' => 'Unable to save due to input errors.  Please go to the Location tab to address them, and then retry saving.  Errors: ',
    'meeting_editor_screen_meeting_validation_warnings' => 'Input warnings shown on the Location tab: ',
    'meeting_editor_screen_meeting_contact_name_1_label' => 'Contact 1 Name:',
    'meeting_editor_screen_meeting_contact_email_1_label' => 'Contact 1 Email:',
    'meeting_editor_screen_meeting_contact_phone_1_label' => 'Contact 1 Phone:',
    'meeting_editor_screen_meeting_contact_name_2_label' => 'Contact 2 Name:',
    'meeting_editor_screen_meeting_contact_email_2_label' => 'Contact 2 Email:',
    'meeting_editor_screen_meeting_contact_phone_2_label' => 'Contact 2 Phone:',
    'meeting_editor_screen_meeting_publish_search_prompt' => 'Leta efter:',
    'meeting_editor_screen_meeting_publish_search_pub' => 'Publiserade möten',
    'meeting_editor_screen_meeting_publish_search_unpub' => 'Opubliserade möten',
    'meeting_editor_screen_meeting_visibility_advice' => 'Detta syns inte vid normal mötessökning',
    'meeting_editor_screen_meeting_publish_search_all' => 'Alla möten',
    'meeting_editor_screen_meeting_create_button' => 'Skapa nytt möte',
    'meeting_editor_screen_delete_button' => 'Kassera detta möte',
    'meeting_editor_screen_delete_button_confirm' => 'Är du säker på att du vill kasta detta möte?',
    'meeting_editor_screen_cancel_button' => 'Ångra',
    'logout' => 'Logga ut (och ta en nypa luft)',
    'meeting_editor_screen_cancel_confirm' => 'Säker på att du vill avsluta? du kommer förlora ev ändringar!',
    'meeting_lookup_failed' => 'Adressökningen misslyckades.',
    'meeting_lookup_failed_not_enough_address_info' => 'Det behövs mer adressinformation',
    'meeting_create_button_name' => 'Spara detta som ett nytt möte',
    'meeting_saved_as_a_copy' => 'Spara en kopia på detta möte',
    'meeting_save_buttonName' => 'Spara ändringar',
    'meeting_editor_tab_bar_basic_tab_text' => 'Grundläggnade',
    'meeting_editor_tab_bar_location_tab_text' => 'Plats',
    'meeting_editor_tab_bar_format_tab_text' => 'MötesFormat',
    'meeting_editor_tab_bar_other_tab_text' => 'Annat',
    'meeting_editor_tab_bar_history_tab_text' => 'Historik',
    'meeting_editor_result_count_format' => '%d Möten funna',
    'meeting_id_label' => 'Mötes ID:',
    'meeting_editor_default_zoom' => '13',
    'meeting_editor_default_weekday' => '2',
    'meeting_editor_default_start_time' => '19:00:00',
    'login_banner' => 'Basic Meeting List Toolbox',
    'login_underbanner' => 'Root Server Administrationssida',
    'login' => 'Användarnamn',
    'password' => 'Lösenord',
    'button' => 'Logga in',
    'cookie' => 'Du måste aktivera "cookies" för att de ska fungera.',
    'noscript' => 'Du måste aktivera javascript!',
    'title' => 'Logga in för att göra ändringar',
    'edit_Meeting_object_not_found' => 'FEL: mötet fanns inte.',
    'edit_Meeting_object_not_changed' => 'FEL: mötet ändrades inte',
    'edit_Meeting_auth_failure' => 'Du har inte rättigheter till att ändra detta möte',
    'not_auth_1' => 'DU SAKNAR RÄTTIGHETER',
    'not_auth_2' => 'Du saknar rättigheter till att adminitrera servern',
    'not_auth_3' => 'Problem med dina uppgifter... Capslock eller slarvpelle?',
    'email_format_bad' => 'Epostadressen du angav var felformaterad. (inge snabelsnok eller liknande)',
    'history_header_format' => '<div class="bmlt_admin_meeting_history_list_item_line_div history_item_header_div"><span class="bmlt_admin_history_list_header_date_span">%s</span><span class="bmlt_admin_history_list_header_user_span">av %s</span></div>',
    'history_no_history_available_text' => '<h1 class="bmlt_admin_no_history_available_h1">Ingen historik för detta möte</h1>',
    'service_body_editor_disclosure' => 'Serviceenhet Administratör',
    'service_body_change_fader_success_text' => 'Serviceenheten ändrad framgångsrikt.',
    'service_body_change_fader_fail_text' => 'Lyckades inte ändra Serviceenheten ',
    'service_body_editor_screen_sb_id_label' => 'ID:',
    'service_body_editor_screen_sb_name_label' => 'Namn:',
    'service_body_name_default_prompt_text' => 'Fyll i Serviceenhetens namn',
    'service_body_parent_popup_label' => 'Serviceenhetens förälder:',
    'service_body_parent_popup_no_parent_option' => 'Ingen förälder (Top-nivå)',
    'service_body_editor_screen_sb_admin_user_label' => 'Primär Administratör:',
    'service_body_editor_screen_sb_admin_description_label' => 'Beskrivning:',
    'service_body_description_default_prompt_text' => 'Fyll i en beskrivning för serviceenheten',
    'service_body_editor_screen_sb_admin_email_label' => 'Kontakt Serviceenhet (Epost):',
    'service_body_email_default_prompt_text' => 'Fyll i en Epostadress för serviceenheten.',
    'service_body_editor_screen_sb_admin_uri_label' => 'web-adress',
    'service_body_uri_default_prompt_text' => 'Fyll i en web-adress för serviceenheten',
    'service_body_editor_screen_sb_admin_full_editor_label' => 'Redaktörer för hela möteslistan:',
    'service_body_editor_screen_sb_admin_full_editor_desc' => 'Dessa redaktörer kan ändra samtliga möten i möteslistan.',
    'service_body_editor_screen_sb_admin_editor_label' => 'Grundläggande redaktörer:',
    'service_body_editor_screen_sb_admin_editor_desc' => 'Dessa redaktörer kan endast ändringar i en specifik serviceenhet. Bara i opubliserade möten.',
    'service_body_editor_screen_sb_admin_observer_label' => 'Observatörer:',
    'service_body_editor_screen_sb_admin_observer_desc' => 'Dessa kan inte ändra något. Men kan se dold information',
    'service_body_dirty_confirm_text' => 'Du har gjort ändringar i serviceenheten. Vill du lämna och förlora dina ändringar?',
    'service_body_save_button' => 'Spara ändringar i serviceenheten',
    'service_body_create_button' => 'Skapa serviceenhet',
    'service_body_delete_button' => 'Kassera serviceenhet',
    'service_body_delete_perm_checkbox' => 'Kassera serviceenhet permanent',
    'service_body_delete_button_confirm' => 'Säker på att du vill kassera serviceenheten? Make sure that all meetings are either removed or transferred to another service body before performing this function.',
    'service_body_delete_button_confirm_perm' => 'Serviceenheten kasseras nu för gott!',
    'service_body_change_fader_create_success_text' => 'Serviceenhet skapad',
    'service_body_change_fader_create_fail_text' => 'Serviceenheten skapades inte!',
    'service_body_change_fader_delete_success_text' => 'Serviceenheten är nu kasserad',
    'service_body_change_fader_delete_fail_text' => 'Serviceenheten kasserades inte!',
    'service_body_change_fader_fail_no_data_text' => 'Serviceenheten ändrades inte, Eftersom du inte fyllt i någon data!',
    'service_body_change_fader_fail_cant_find_sb_text' => 'Serviceenheten ändrades inte, Eftersom serviceenheten saknas',
    'service_body_change_fader_fail_cant_update_text' => 'Serviceenheten ändrades inte, Eftersom serviceenheten inte uppdaterades',
    'service_body_change_fader_fail_bad_hierarchy' => 'Serviceenheten ändrades inte, För föräldraserviceenheten är under denna Serviceenhet, och kan inte användas',
    'service_body_cancel_button' => 'återställ',
    'service_body_editor_type_label' => 'Serviceenhet typ:',
    'service_body_editor_type_c_comdef_service_body__GRP__' => 'Grupp',
    'service_body_editor_type_c_comdef_service_body__COP__' => 'Co-Op',
    'service_body_editor_type_c_comdef_service_body__ASC__' => 'Distrikt',
    'service_body_editor_type_c_comdef_service_body__RSC__' => 'Region',
    'service_body_editor_type_c_comdef_service_body__WSC__' => 'World Service',
    'service_body_editor_type_c_comdef_service_body__MAS__' => 'Metro',
    'service_body_editor_type_c_comdef_service_body__ZFM__' => 'Zon',
    'service_body_editor_type_c_comdef_service_body__GSU__' => 'Group Service Unit',
    'service_body_editor_type_c_comdef_service_body__LSU__' => 'Local Service Unit',
    'service_body_editor_screen_helpline_label' => 'Helpline:',
    'service_body_editor_screen_helpline_prompt' => 'Enter The Helpline Telephone Number',
    'service_body_editor_uri_naws_format_text' => 'Ladda ner mötesinfo från denna serviceenhet i en NAWS kompatibel fil ',
    'edit_Meeting_meeting_id' => 'Mötes ID:',
    'service_body_editor_create_new_sb_option' => 'Skapa en ny serviceenhet',
    'service_body_editor_screen_world_cc_label' => 'NAWS kod:',
    'service_body_editor_screen_world_cc_prompt' => 'Fyll i NAWS kod',
    'user_editor_disclosure' => 'Användar Administration',
    'user_editor_create_new_user_option' => 'Skapa en användare',
    'user_editor_screen_sb_id_label' => 'ID:',
    'user_editor_account_login_label' => 'Användarnamn:',
    'user_editor_login_default_text' => 'Fyll i användarnamn',
    'user_editor_account_type_label' => 'Användaren är en:',
    'user_editor_user_owner_label' => 'Owned By: ', // TODO translate
    'user_editor_account_type_1' => 'Server Administratör',
    'user_editor_account_type_2' => 'Serviceenhets Administratör',
    'user_editor_account_type_3' => 'Serviceenhet Redaktör',
    'user_editor_account_type_5' => 'Serviceenhet observatör',
    'user_editor_account_type_4' => 'Inaktivera användare',
    'user_editor_account_name_label' => 'Användarnamn:',
    'user_editor_name_default_text' => 'Fyll i användarnamn',
    'user_editor_account_description_label' => 'Beskrivning:',
    'user_editor_description_default_text' => 'Fyll i beskrivning för användare',
    'user_editor_account_email_label' => 'E-post:',
    'user_editor_email_default_text' => 'Fyll i E-post för användaren:',
    'user_change_fader_success_text' => 'Användaren ändrad',
    'user_change_fader_fail_text' => 'Användaren ändrades inte!',
    'user_change_fader_create_success_text' => 'Användaren skapades',
    'user_change_fader_create_fail_text' => 'Användaren skapades inte!',
    'user_change_fader_create_fail_already_exists' => 'A Login For The User That You Are Trying To Create Already Exists.',
    'user_change_fader_delete_success_text' => 'Användaren kasserad',
    'user_change_fader_delete_fail_text' => 'Användaren kasserades inte!',
    'user_save_button' => 'Spara ändringar för användaren',
    'user_create_button' => 'Skapa ny användare',
    'user_cancel_button' => 'återställ',
    'user_delete_button' => 'Kassera denna användare',
    'user_delete_perm_checkbox' => 'Kassera denna användare permanent',
    'user_password_label' => 'ändra lösenord till:',
    'user_new_password_label' => 'lösenord:',
    'user_password_default_text' => 'Låt denna vara såvida du inte önskar ändra lösenordet',
    'user_new_password_default_text' => 'Ange lösenord för den nya användaren!',
    'user_dirty_confirm_text' => 'Du har gjort ändringar för användaren, vill du lämna och bli av med ändringarna?',
    'user_delete_button_confirm' => 'Vill du kassera användaren?',
    'user_delete_button_confirm_perm' => 'Användaren kasseras nu permanent!',
    'user_create_password_alert_text' => 'Ange ett lösenord',
    'user_change_fader_fail_no_data_text' => 'Användaren ändrades inte, Ingen data angavs',
    'user_change_fader_fail_cant_find_sb_text' => 'Användaren ändrades inte, Användaren finns inte',
    'user_change_fader_fail_cant_update_text' => 'Användaren ändrades inte, Användaren uppdaterades inte',
    'format_editor_disclosure' => 'MötesFormat Administration',
    'format_change_fader_change_success_text' => 'Mötesformatet ändrades',
    'format_change_fader_change_fail_text' => 'Mötesformatet ändrades inte!',
    'format_change_fader_create_success_text' => 'Mötesformat skapat',
    'format_change_fader_create_fail_text' => 'Mötesformatet skapades inte!',
    'format_change_fader_delete_success_text' => 'Mötesformatet kasserades',
    'format_change_fader_delete_fail_text' => 'Mötesformatet kasserades inte!',
    'format_change_fader_fail_no_data_text' => 'Mötesformatet ändrades inte, Inge data angivet',
    'format_change_fader_fail_cant_find_sb_text' => 'Mötesformatet ändrades inte, Mötesformatet hittades inte',
    'format_change_fader_fail_cant_update_text' => 'Mötesformatet ändrades inte, För mötesformatet uppdaterades inte',
    'format_editor_name_default_text' => 'Ange en kort beskrivning',
    'format_editor_description_default_text' => 'Ange en utförlig beskrivning',
    'format_editor_create_format_button_text' => 'skapa nytt mötesformat',
    'format_editor_cancel_create_format_button_text' => 'ångra',
    'format_editor_create_this_format_button_text' => 'Skapa mötesformat',
    'format_editor_change_format_button_text' => 'ändra mötesformat',
    'format_editor_delete_format_button_text' => 'Kassera mötesformat',
    'format_editor_reset_format_button_text' => 'återställ',
    'need_refresh_message_fader_text' => 'Du bör uppdatera sidan innan du använder denna sektion',
    'need_refresh_message_alert_text' => 'Eftersom du gjort ändringar i serviceenhets administrationen, användar administrationen eller mötesformat administrationen, är det möjligt att information i denna sektion är felaktig, Så logga in och ut så blir allt fint',
    'format_editor_delete_button_confirm' => 'är du säker på att du vill kassera detta mötesformat?',
    'format_editor_delete_button_confirm_perm' => 'Mötesformatet kommer kasseras permanent!',
    'format_editor_missing_key' => 'This format should have an entry for every language (at least a key).',   // TODO: translate
    'format_editor_reserved_key' => 'This key is reserved for a venue type format - please use something different.',       // TODO: translate
    'min_password_length_string' => 'Lösenordet måste vara minst %d tecken långt!',
    'AJAX_Auth_Failure' => 'Tillträde nekas. Det kan vara problem med serverinställningar.',
    'Maps_API_Key_Warning' => 'There is a problem with the Google Maps API Key.',
    'Observer_Link_Text' => 'Meeting Browser',
    'Data_Transfer_Link_Text' => 'Import Meeting Data (WARNING: Replaces Current Data!)',
    'MapsURL' => 'https://maps.google.com/maps?q=##LAT##,##LONG##+(##NAME##)&amp;ll=##LAT##,##LONG##',
    'hidden_value' => 'Cannot Display Data -Unauthorized',
    'Value_Prompts' => array(
        'id_bigint' => 'Meeting ID',
        'worldid_mixed' => 'World Services ID',
        'service_body' => 'Service Body',
        'service_bodies' => 'Service Bodies',
        'weekdays' => 'Weekdays',
        'weekday' => 'Meeting Gathers Every',
        'start_time' => 'Meeting Starts at',
        'duration_time' => 'Meeting Lasts',
        'location' => 'Location',
        'duration_time_hour' => 'Hour',
        'duration_time_hours' => 'Hours',
        'duration_time_minute' => 'Minute',
        'duration_time_minutes' => 'Minutes',
        'lang_enum' => 'Language',
        'formats' => 'Formats',
        'distance' => 'Distance from Center',
        'generic' => 'NA Meeting',
        'close_title' => 'Close This Meeting Detail Window',
        'close_text' => 'Close Window',
        'map_alt' => 'Map to Meeting',
        'map' => 'Follow This Link for A Map',
        'title_checkbox_unpub_meeting' => 'This meeting is unpublished. It cannot be seen by regular searches.',
        'title_checkbox_copy_meeting' => 'This meeting is a duplicate of another meeting. It is also unpublished. It cannot be seen by regular searches.'
    ),
    'world_format_codes_prompt' => 'Naws mötesformat:',
    'world_format_codes' => array(
        '' => 'Ingen',
        'OPEN' => 'Öppet möte',
        'CLOSED' => 'Slutet möte',
        'WCHR' => 'Rullstolsvänlig lokal',
        'BEG' => 'Nykomling',
        'BT' => 'Basic Text möte',
        'CAN' => 'Ljusmöte',
        'CPT' => '12 Konsept möte',
        'CW' => 'Barn välkomna',
        'DISC' => 'Diskutionsmöte',
        'GL' => 'Gay/Lesbiskt',
        'IP' => 'IP Studie',
        'IW' => 'Det fungerar Studie',
        'JFT' => 'Bara för idag Studie',
        'LC' => 'Living Clean Studie',
        'LIT' => 'Literatur Studie',
        'M' => 'Mansmöte',
        'MED' => 'Meditationsmöte',
        'QA' => 'Frågor och svar',
        'RA' => 'Ej publikt möte',
        'NS' => 'Non-Smoking',
        'S-D' => 'Speaker/Discussion', // TODO translate
        'SMOK' => 'Rökare',
        'SPK' => 'Talarmöte',
        'STEP' => 'Stegmöte',
        'SWG' => 'Stegarnetsguiden studie',
        'TOP' => 'Temamöte',
        'TRAD' => 'Traditionsmöte',
        'VAR' => 'Blandad mötesform',
        'W' => 'Kvinnomöte',
        'Y' => 'Ungdomsmöte',
        'LANG' => 'Alternativt språk',
        'GP' => 'Guiding Principles', // TODO translate
        'NC' => 'No Children', // TODO translate
        'CH' => 'Closed Holidays', // TODO translate
        'VM' => 'Virtual', // TODO translate
        'HYBR' => 'Virtual and In-Person', // TODO translate
        'TC' => 'Temporarily Closed Facility', // TODO translate
        'SPAD' => 'Spiritual Principle a Day', // TODO translate
    ),
    'format_type_prompt' => 'Format Type:',    // TODO: Translate
    'format_type_codes' => array(
        '' => 'None',    // TODO: Translate
        'FC1' => 'Meeting Format (Speaker, Book Study, etc.)',    // TODO: Translate
        'FC2' => 'Location Code (Wheelchair Accessible, Limited Parking, etc.)',    // TODO: Translate
        'FC3' => 'Common Needs and Restrictions (Mens Meeting, LGTBQ, No Children, etc.)',    // TODO: Translate
        'O' => 'Attendance by non-addicts (Open, Closed)',    // TODO: Translate
        'LANG' => 'Language', // TODO: TRANSLATE
        'ALERT' => 'Format should be especially prominent (Clean requirement, etc.)',// TODO: Translate
    ),
    'cookie_monster' => 'Denna sida använder cookies för att minnas ditt språkval.',
    'main_prompts' => array(
        'id_bigint' => 'ID',
        'worldid_mixed' => 'World ID',
        'shared_group_id_bigint' => 'Unused',
        'service_body_bigint' => 'Service Body ID',
        'weekday_tinyint' => 'Weekday',
        'venue_type' => 'Venue Type',
        'start_time' => 'Start Time',
        'duration_time' => 'Duration',
        'time_zone' => 'Time Zone',
        'formats' => 'Formats',
        'lang_enum' => 'Language',
        'longitude' => 'Longitude',
        'latitude' => 'Latitude',
        'published' => 'Published',
        'email_contact' => 'Email Contact',
    ),
    'check_all' => 'Check All',
    'uncheck_all' => 'Uncheck All',
    'automatically_calculated_on_save' => 'Automatically calculated on save.'
);

$email_contact_strings = array(
    'meeting_contact_form_subject_format' => "[MEETING LIST CONTACT] %s",
    'meeting_contact_message_format' => "%s\n--\nThis message concerns the meeting named \"%s\", which meets at %s, on %s.\nBrowser Link: %s\nEdit Link: %s\nIt was sent directly from the meeting list web server, and the sender is not aware of your email address.\nPlease be aware that replying will expose your email address.\nIf you use \"Reply All\", and there are multiple email recipients, you may expose other people's email addresses.\nPlease respect people's privacy and anonymity; including the original sender of this message."
);

$change_type_strings = array(
    '__THE_MEETING_WAS_CHANGED__' => 'The meeting was changed.',
    '__THE_MEETING_WAS_CREATED__' => 'The meeting was created.',
    '__THE_MEETING_WAS_DELETED__' => 'The meeting was deleted.',
    '__THE_MEETING_WAS_ROLLED_BACK__' => 'The meeting was rolled back to a previous version.',

    '__THE_FORMAT_WAS_CHANGED__' => 'The format was changed.',
    '__THE_FORMAT_WAS_CREATED__' => 'The format was created.',
    '__THE_FORMAT_WAS_DELETED__' => 'The format was deleted.',
    '__THE_FORMAT_WAS_ROLLED_BACK__' => 'The format was rolled back to a previous version.',

    '__THE_SERVICE_BODY_WAS_CHANGED__' => 'The service body was changed.',
    '__THE_SERVICE_BODY_WAS_CREATED__' => 'The service body was created.',
    '__THE_SERVICE_BODY_WAS_DELETED__' => 'The service body was deleted.',
    '__THE_SERVICE_BODY_WAS_ROLLED_BACK__' => 'The service body was rolled back to a previous version.',

    '__THE_USER_WAS_CHANGED__' => 'The user was changed.',
    '__THE_USER_WAS_CREATED__' => 'The user was created.',
    '__THE_USER_WAS_DELETED__' => 'The user was deleted.',
    '__THE_USER_WAS_ROLLED_BACK__' => 'The user was rolled back to a previous version.',

    '__BY__' => 'by',
    '__FOR__' => 'for'
);

$detailed_change_strings = array(
    'was_changed_from' => 'was changed from',
    'to' => 'to',
    'was_changed' => 'was changed',
    'was_added_as' => 'was added as',
    'was_deleted' => 'was deleted',
    'was_published' => 'The meeting was published',
    'was_unpublished' => 'The meeting was unpublished',
    'formats_prompt' => 'The meeting format',
    'duration_time' => 'The meeting duration',
    'start_time' => 'The meeting start time',
    'longitude' => 'The meeting longitude',
    'latitude' => 'The meeting latitude',
    'sb_prompt' => 'The meeting changed its Service Body from',
    'id_bigint' => 'The meeting ID',
    'lang_enum' => 'The meeting language',
    'worldid_mixed' => 'The World Committee Code',
    'weekday_tinyint' => 'The day of the week on which the meeting gathers',
    'non_existent_service_body' => 'Service Body No Longer Exists',
);

defined('_END_CHANGE_REPORT') or define('_END_CHANGE_REPORT', '.');
