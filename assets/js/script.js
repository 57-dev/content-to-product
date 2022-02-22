/*
Author: dump501
admin_ui.scd.js (c) 2021
Desc: manage admin user interface
*/
window.addEventListener("load", function () {

    //global 
    const scdBody = document.querySelector('.scd_body');
    const scdGeneralSettingsBtn = document.querySelector('#general_settings');
    const scdHelpSuppportBtn = document.querySelector('#help_support');

    const scdGeneralSettingsContent = document.querySelector('#general_settings_content');
    const scdHelpSuppportContent = document.querySelector('#help_support_content');

    console.log(scdHelpSuppportContent)
    const scdSettingContent = [
        scdGeneralSettingsContent,
        scdHelpSuppportContent
    ];

    const scdSettingBtn = [
        scdGeneralSettingsBtn,
        scdHelpSuppportBtn
    ];

    if (document.querySelector(localStorage['active_item']) !== null) {
        hideContents();
        document.querySelector(localStorage['active_item']).classList.add("active");
        if (document.querySelector(localStorage['active_item'] + '_content') !== null) {
            document.querySelector(localStorage['active_item'] + '_content').style.display = "block";
        }
        scdBody.classList.remove('d-none')
    } else {
        scdBody.classList.remove('d-none')
        hideContents();
        localStorage['active_item'] = '#' + scdSubscriptionManagerBtn.id
        scdSubscriptionManagerBtn.classList.add("active");
        scdSubscriptionManagerContent.style.display = "block";

    }


    //event listeners
    if (scdGeneralSettingsBtn !== null) { scdGeneralSettingsBtn.addEventListener('click', handleGeneralSettings) }
    if (scdHelpSuppportBtn !== null) { scdHelpSuppportBtn.addEventListener('click', handleHelpSupport) }


    //functions
    /**
     * insert after function
     */
    function insertAfter(newNode, referenceNode) {
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
    }

    /**
     * reset all the settings content to disply none
     */
    function hideContents() {

        for (let content of scdSettingContent) {
            if (content !== null) {
                content.style.display = "none";
            }
        }

        for (const btn of scdSettingBtn) {
            if (btn !== null) {
                btn.classList.remove("active");
            }
        }

    }

    /**
     * handles the click on general settings button
     * 
     * @param {*} e 
     */
    function handleGeneralSettings(e) {
        e.preventDefault();
        hideContents();
        localStorage['active_item'] = '#' + scdGeneralSettingsBtn.id
        scdGeneralSettingsBtn.classList.add("active");
        scdGeneralSettingsContent.style.display = "block";

    }

    /**
     * handles the click on help and support button
     * 
     * @param {*} e 
     */
    function handleHelpSupport(e) {
        e.preventDefault();
        hideContents();
        localStorage['active_item'] = '#' + scdHelpSuppportBtn.id
        scdHelpSuppportBtn.classList.add("active");
        scdHelpSuppportContent.style.display = "block";
    }

})
