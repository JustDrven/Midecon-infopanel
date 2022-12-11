<?php

class config {

    function location($url) {
        header("Location: ". $url);
    }
    
    // Developer by: Drven
    

    public $messages = [
        "success_message" => "Nastavení ticketu bylo úspěšné!",
        "custom_error" => "Někde nastala chyba!",
        "id_error_message" => "Tento ticket neexistuje!"
    ];

    public $if_perms_check = [
        "page_access" => [
            "tickets-list" => [
                "permission" => "midecon.page.tickets.list"
            ],
            "ban-list" => [
                "permission" => "midecon.page.ban.list"
            ],
            "whitelist-list" => [
                "permission" => "midecon.page.whitelist.list"
            ],
            "ftp-list" => [
                "permission" => "midecon.page.ftp.list"
            ]
        ]
    ];
 
    public $types = [
        "all" => [
            "leader" => [
                "name" => "Vedení Serveru"
            ],
            "helper" => [
                "name" => "Hlavní Helper"
            ],
            "builder" => [
                "name" => "Hlavní Builder"
            ],
        ],
        "helpers" => [
            "enabled" => true,
            "name" => "Helpers",
            "link" => "type=helper"
        ],
        "builders" => [
            "enabled" => true,
            "name" => "Builders",
            "link" => "type=builder"
        ]
    ];

}
