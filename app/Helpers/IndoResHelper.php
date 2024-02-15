<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApilogsInstantPayDMT;

class IndoResHelper
{
    public static function response($value = "none", $mockmodestatus = "none")
    {
        if ($value == "activationStatus") {
            if ($mockmodestatus == "SUCCESS") {
                return $result = [
                    "response" => [
                        "statuscode" => "TXN",
                        "actcode" => null,
                        "status" => "Transaction Successful",
                        "data" => [
                            "cspStatus" => "APPROVED",
                            "cspCode" => "PM00189590",
                        ],
                        "timestamp" => "2022-10-12 11:46:04",
                        "ipay_uuid" =>
                            "h006977b3b95-dd6d-4c46-af52-8ec608cbb7c0",
                        "orderid" => null,
                        "environment" => "LIVE",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } elseif ($mockmodestatus == "FAILED") {
                return $result = [
                    "response" => [
                        "statuscode" => "OUI",
                        "actcode" => null,
                        "status" =>"The X-Ipay-Outlet-Id header must have valid outletId. #1",
                        "data" => null,
                        "timestamp" => "2024-02-01 11:39:12",
                        "ipay_uuid" =>"h0069b3ac88f-1322-406b-9374-c592f8067bb4-zLRLZXuH5P8V",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } else {
                return $result = [];
            }
        } elseif ($value == "staticData") {
            if ($mockmodestatus == "SUCCESS") {
                return $result = [
                    "response" => [
                        "statuscode" => "TXN",
                        "actcode" => null,
                        "status" => "Transaction Successful",
                        "data" => [
                            [
                                "label" => "Aadhaar Card",
                                "value" => "Aadhaar Card",
                            ],
                            [
                                "label" => "Indian Driving License",
                                "value" => "Indian Driving License",
                            ],
                            [
                                "label" => "Nepalese Citizenship",
                                "value" => "Nepalese Citizenship",
                            ],
                            [
                                "label" => "Nepalese Passport",
                                "value" => "Nepalese Passport",
                            ],
                        ],
                        "timestamp" => "2022-10-11 16=>30=>05",
                        "ipay_uuid" =>"h00697799e2b-c1c2-4414-bab2-74f66d3c4326",
                        "orderid" => null,
                        "environment" => "LIVE",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } elseif ($mockmodestatus == "PENDING") {
                return $result = [
                    "response" => [
                        "statuscode" => "ERR",
                        "actcode" => null,
                        "status" => "The selected type is invalid.",
                        "data" => null,
                        "timestamp" => "2024-02-01 12:18:02",
                        "ipay_uuid" =>"h0059b3ad672-cacf-470e-b4c1-56e1762a3697-lJDiYnIbQo24",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } else {
                return $result = [];
            }
        } elseif ($value == "paymentLocationList") {
            if ($mockmodestatus == "SUCCESS") {
                return $result = [
                    "response" => [
                        "statuscode" => "TXN",
                        "actcode" => null,
                        "status" => "Transaction Successful",
                        "data" => [
                            [
                                "locationId" => 0,
                                "locationName" => "Prabhu Bank Limited",
                                "bankBranchId" => 0,
                                "bankName" => null,
                                "branchName" => "-",
                                "branchCode" => "-",
                                "routingCode" => "-",
                                "country" => "Nepal",
                                "address" =>"Payment at any Cash Pickup agent of Prabhu Bank, Prabhu Money Transfer, Prabhu Management",
                                "state" => "",
                                "district" => "",
                                "city" => "",
                                "phoneNumber" => "",
                            ],
                        ],
                        "timestamp" => "2022-10-13 10:32:57",
                        "ipay_uuid" =>"h005977d246a-bd3a-4727-8664-f0d6e41d06fc",
                        "orderid" => null,
                        "environment" => "LIVE",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } elseif ($mockmodestatus == "FAILED") {
                return $result = [
                    "response" => [
                        "statuscode" => "SPD",
                        "actcode" => null,
                        "status" => "Service Provider Downtime",
                        "data" => [],
                        "timestamp" => "2024-02-01 12:33:06",
                        "ipay_uuid" =>"h0059b3adbd4-3486-4884-b80a-9bcb60284219-pyU4wwGU1MCL",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } else {
                return $result = [];
            }
        } elseif ($value == "stateDistrict") {
            if ($mockmodestatus == "SUCCESS") {
                return $result = [
                    "response" => [
                        "statuscode" => "TXN",
                        "actcode" => null,
                        "status" => "Transaction Successful",
                        "data" => [
                            [
                               "state"=>"Andaman and Nicobar (UT)",
                               "district"=>"Nicobar",
                               "stateCode"=>"AN"
                             
                            ],
                             [ 
                               "state"=>"Andaman and Nicobar (UT)",
                               "district"=>"North and Middle Andaman",
                               "stateCode"=>"AN"
                             ],
                              [
                               "state"=>"Andaman and Nicobar (UT)",
                               "district"=>"South Andaman",
                               "stateCode"=>"AN"
                              ],
                             [
                               "state"=>"Andhra Pradesh",
                               "district"=>"Anantapur",
                               "stateCode"=>"AP"
                             ],
                             [
                               "state"=>"Andhra Pradesh",
                               "district"=>"Chittoor",
                               "stateCode"=>"AP"
                             ],
                              [
                                +"state"=> "Andhra Pradesh",
                                +"district"=> "East Godavari",
                                +"stateCode"=> "AP"
                              ]
                        ],
                        "timestamp" => "2024-02-01 12:40:55",
                        "ipay_uuid" =>"h0059b3adea1-86a3-4d4a-b811-8b96b6125953-CVv8F6jhMLln",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } elseif ($mockmodestatus == "FAILED") {
                return $result = [
                    "response" => [
                        "statuscode" => "ERR",
                        "actcode" => null,
                        "status" => "No Record Found",
                        "data" => null,
                        "timestamp" => "2024-02-01 12:48:10",
                        "ipay_uuid" =>"h0069b3ae139-0fe6-4361-a46c-f36165d47a98-HupjpUHXn7p8",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } else {
                return $result = [];
            }
        } elseif ($value == "remitterProfile") {
            if ($mockmodestatus == "SUCCESS") {
                return $result = [
                    "response" => [
                        "statuscode" => "TXN",
                        "actcode" => null,
                        "status" => "Transaction Successful",
                        "data" => [
                            "id" => "979605",
                            "mobile" => "7972538761",
                            "firstName" => "POOJA BHAGWAN GAIKWAD",
                            "gender" => "Female",
                            "dob" => "1981-08-06",
                            "address" => "DELHI",
                            "city" => "GODAVARI",
                            "state" => "Andhra Pradesh",
                            "district" => "East Godavari",
                            "nationality" => "Nepalese",
                            "employer" => "sec2pay",
                            "incomeSource" => "Business",
                            "status" => "Verified",
                            "eKycStatus" => "Unverified",
                            "onboardingStatus" => "Pending",
                            "approveStatus" => "",
                            "approveComment" => "",
                            "ids" => [
                                [
                                    "idType" => "Aadhaar Card",
                                    "idNumber" => "XXXXXXXX6078",
                                ],
                            ],
                            "transactionCount" => [
                                "day" => "0",
                                "month" => "0",
                                "year" => "0",
                            ],
                            "beneficiaries" => [
                                [
                                    "id" => "2097137",
                                    "name" => "POOJA",
                                    "gender" => "Female",
                                    "relationship" => "Brother",
                                    "address" => "DELHI",
                                    "mobile" => "9851054440",
                                    "paymentMode" => "Cash Payment",
                                    "bankBranchId" => "",
                                    "bankName" => "",
                                    "bankBranchName" => "",
                                    "acNumber" => "",
                                ],
                            ],
                        ],
                        "timestamp" => "2024-02-01 12:53:24",
                        "ipay_uuid" =>"h0069b3ae317-d5dd-4475-97a1-cc39d8b87de3-igphRG07h0oO",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } elseif ($mockmodestatus == "FAILED") {
                return $result = [
                    "response" => [
                        "statuscode" => "RNF",
                        "actcode" => null,
                        "status" => "Remitter Not Found",
                        "data" => null,
                        "timestamp" => "2024-02-01 12:59:21",
                        "ipay_uuid" =>"h0069b3ae538-781a-4834-81fb-f1243fa383a2-JGY2uvh1d7ru",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } else {
                return $result = [];
            }
        } elseif ($value == "sendOtp") {
            if ($mockmodestatus == "SUCCESS") {
                return $result = [
                    "response" => [
                        "statuscode" => "TXN",
                        "actcode" => null,
                        "status" =>"OTP sent to remitter mobile number XXXXXXX413",
                        "data" => [
                            "otpReference" => "b05483ba-9714-4a7c-b861-2790c0721fa6",
                        ],
                        "timestamp" => "2024-02-01 13:04:40",
                        "ipay_uuid" =>"h0069b3ae719-420d-47fc-bd5b-0d64f76e6355-zjWu4Adr1gIu",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } elseif ($mockmodestatus == "FAILED") {
                return $result = [
                    "response" => [
                        [
                            "statuscode" => "RAR",
                            "actcode" => null,
                            "status" => "Remitter Already Registered",
                            "data" => [
                                "otpReference" => [],
                            ],
                            "timestamp" => "2024-02-01 13=>07=>20",
                            "ipay_uuid" =>"h0059b3ae812-eb34-49e5-8e9f-089d01ecf993-kRBs2eVh9ZBS",
                            "orderid" => null,
                            "environment" => "SANDBOX",
                            "internalCode" => null,
                        ],
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } else {
                return $result = [];
            }
        } elseif ($value == "remitterRegistration") {
            if ($mockmodestatus == "SUCCESS") {
                return $result = [
                    "response" => [
                        "statuscode" => "TXN",
                        "actcode" => null,
                        "status" => "Transaction Successful",
                        "data" => [
                            "id" => "979345",
                            "mobile" => "9899999999",
                            "firstName" => "POOJA BHAGWAN GAIKWAD",
                            "gender" => "Female",
                            "dob" => "1981-08-24",
                            "address" => "DELHI",
                            "city" => "GODAVARI",
                            "state" => "Andhra Pradesh",
                            "district" => "East Godavari",
                            "nationality" => "Nepalese",
                            "employer" => "sec2pay",
                            "incomeSource" => "Business",
                            "status" => "Verified",
                            "eKycStatus" => "Unverified",
                            "onboardingStatus" => "Pending",
                            "approveStatus" => "",
                            "approveComment" => "",
                            "ids" => [
                                [
                                    "idType" => "Aadhaar Card",
                                    "idNumber" => "XXXXXXXX6078",
                                ],
                            ],
                            "transactionCount" => [
                                "day" => "0",
                                "month" => "0",
                                "year" => "0",
                            ],
                            "beneficiaries" => [],
                        ],
                        "timestamp" => "2024-02-01 15:28:53",
                        "ipay_uuid" =>"h0069b3b1ab2-d1d8-42c2-9e24-3a601e31b8e0-xwwtb6nPvQTX",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } elseif ($mockmodestatus == "FAILED") {
                return $result = [
                    "response" => [
                        "statuscode" => "IVC",
                        "actcode" => null,
                        "status" => "Invalid Verification Code or OTP",
                        "data" => [
                            "Code" => "047",
                            "Message" =>
                                "OTP Vefification Failed=> OTP Already Used, Generate New OTP [004]",
                            "CustomerId" => [],
                        ],
                        "timestamp" => "2024-02-01 15:24:41",
                        "ipay_uuid" =>"h0059b3b192f-eb79-4f49-b596-85a5de0351d9-Fxqck6okb3mc",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } else {
                return $result = [];
            }
        } elseif ($value == "remitterEkycInitiate") {
            if ($mockmodestatus == "SUCCESS") {
                return $result = [
                    "response" => [
                        "statuscode" => "TXN",
                        "actcode" => null,
                        "status" => "Transaction Successful",
                        "data" => [
                            "referenceKey" =>
                                "IILE1h0689b3b1d97-54f4-4db5-9d84-0cffd3abcff0-WCFaJKYgISbZ",
                            "url" =>
                                "https://uid.rblbank.com/CustomerLogin/pgekyctoken.aspx?uniqueref=9a87SlDgfvdFvGCHMR0hZzPsWrs%2fg1oAN8M1Vlbo7DOCTcJ023%2b2sQXm%2ffLvbHFbJxGM0Uco2z1Zy1XnIMwqarWqQg9kTteQxYGT173i0lu7LN%2fQN8IfnuiB2gT8lcKA49HyrR7xQBnaAdI6sDQUDvql5vX%2bCCqD%2bqQgu7Z5J3Dnq3njnOjGsIdNWN5RcQ1LIM9dALBTlGSUa3UrYQYRhQ%3d%3d&cpuniquerefno=PRACP20241088190",
                        ],
                        "timestamp" => "2024-02-01 15:37:00",
                        "ipay_uuid" =>
                            "h0689b3b1d97-54f4-4db5-9d84-0cffd3abcff0-WCFaJKYgISbZ",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } elseif ($mockmodestatus == "FAILED") {
                return $result = [
                    "response" => [
                        "statuscode" => "ISE",
                        "actcode" => null,
                        "status" => "System Error",
                        "data" => null,
                        "timestamp" => "2024-02-01 15:38:59",
                        "ipay_uuid" =>"h0689b3b1e4c-ac7c-44c3-867a-488e153637d5-OaUX5z6dXXig",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } else {
                return $result = [];
            }
        } elseif ($value == "remitterEkycInitiateStatus") {
            if ($mockmodestatus == "SUCCESS") {
                return $result = [
                    "response" => [
                        "statuscode" => "TXN",
                        "actcode" => null,
                        "status" => "Transaction Successful",
                        "data" => null,
                        "timestamp" => "2024-02-01 15:47:10",
                        "ipay_uuid" =>"h0059b3b213b-0f06-4865-96bb-7cd55138de65-Vxt1G6aUQyLt",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } elseif ($mockmodestatus == "FAILED") {
                return $result = [
                    "response" => [
                        "statuscode" => "ISE",
                        "actcode" => null,
                        "status" => "System Error",
                        "data" => null,
                        "timestamp" => "2024-02-01 15:43:02",
                        "ipay_uuid" =>"h0069b3b1fbf-ea19-4d46-b625-7ace8514f531-lk1aa3DTTsNV",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } else {
                return $result = [];
            }
        } elseif ($value == "remitterEkycProcess") {
            if ($mockmodestatus == "SUCCESS") {
                return $result = [
                    "response" => [
                        "statuscode" => "TXN",
                        "actcode" => null,
                        "status" => "Transaction Successful",
                        "data" => null,
                        "timestamp" => "2024-02-01 15:47:10",
                        "ipay_uuid" =>"h0059b3b213b-0f06-4865-96bb-7cd55138de65-Vxt1G6aUQyLt",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } elseif ($mockmodestatus == "PENDING") {
                return $result = [
                    "response" => [
                        "statuscode"=>"TUP",
                        "actcode"=>null,
                        "status"=>"Remitter Ekyc Pending",
                        "data"=>null,
                        "timestamp"=>"2024-02-01 17:03:12","ipay_uuid"=>"h0689b3b3c6e-872e-47ff-b146-f79539c02630-1FyMZrEuJlIX",
                        "orderid"=>null,
                        "environment"=>"SANDBOX",
                        "internalCode"=>null
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            }elseif ($mockmodestatus == "FAILED") {
                return $result = [
                    "response" => [
                        "statuscode" => "ERR",
                        "actcode" => null,
                        "status" =>"Error occurred.errorresstatus0descriptionUniquerefno already exist",
                        "data" => null,
                        "timestamp" => "2024-02-01 15=>51=>42",
                        "ipay_uuid" =>"h0689b3b22d9-3883-475e-be4b-2d3d00fda0b0-rJpndaX0kc4e",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } else {
                return $result = [];
            }
        } elseif ($value == "remitterUpdate") {
            if ($mockmodestatus == "SUCCESS") {
                return $result = [
                    "response" => [
                        "statuscode" => "TXN",
                        "actcode" => null,
                        "status" => "Transaction Successful",
                        "data" => null,
                        "timestamp" => "2024-02-01 11:20:46",
                        "ipay_uuid" =>"h00698222a34-ce2c-4670-bb53-8386102793d5",
                        "orderid" => null,
                        "environment" => "LIVE",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } elseif ($mockmodestatus == "FAILED") {
                return $result = [
                    "response" => [
                        "statuscode" => "ERR",
                        "actcode" => null,
                        "status" =>"Customer is not yet eKYC verified. Please do the biokyc first and try again.",
                        "data" => null,
                        "timestamp" => "2024-02-01 13:24:03",
                        "ipay_uuid" =>"h0059b3aee0c-a0e3-411b-8c63-8f323324a873-5V21aSAtIe35",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } else {
                return $result = [];
            }
        } elseif ($value == "beneficiaryRegistration") {
            if ($mockmodestatus == "SUCCESS") {
                return $result = [
                    "response" => [
                        "statuscode" => "TXN",
                        "actcode" => null,
                        "status" => "Transaction Successful",
                        "data" => [
                            "id" => "979605",
                            "mobile" => "7972538761",
                            "firstName" => "POOJA BHAGWAN GAIKWAD",
                            "gender" => "Female",
                            "dob" => "1981-08-06",
                            "address" => "DELHI",
                            "city" => "GODAVARI",
                            "state" => "Andhra Pradesh",
                            "district" => "East Godavari",
                            "nationality" => "Nepalese",
                            "employer" => "sec2pay",
                            "incomeSource" => "Business",
                            "status" => "Verified",
                            "eKycStatus" => "Unverified",
                            "onboardingStatus" => "Pending",
                            "approveStatus" => "",
                            "approveComment" => "",
                            "ids" => [
                                [
                                    "idType" => "Aadhaar Card",
                                    "idNumber" => "XXXXXXXX6078",
                                ],
                            ],
                            "transactionCount" => [
                                "day" => "0",
                                "month" => "0",
                                "year" => "0",
                            ],
                            "beneficiaries" => [
                                [
                                    "id" => "2097137",
                                    "name" => "POOJA",
                                    "gender" => "Female",
                                    "relationship" => "Brother",
                                    "address" => "DELHI",
                                    "mobile" => "9851054440",
                                    "paymentMode" => "Cash Payment",
                                    "bankBranchId" => "",
                                    "bankName" => "",
                                    "bankBranchName" => "",
                                    "acNumber" => "",
                                ],
                                [
                                    "id" => "2098822",
                                    "name" => "POOJA 123",
                                    "gender" => "Female",
                                    "relationship" => "Brother",
                                    "address" => "DELHI",
                                    "mobile" => "9851054400",
                                    "paymentMode" => "Cash Payment",
                                    "bankBranchId" => "",
                                    "bankName" => "",
                                    "bankBranchName" => "",
                                    "acNumber" => "",
                                ],
                            ],
                        ],
                        "timestamp" => "2024-02-01 16:15:48",
                        "ipay_uuid" =>"h0689b3b2b78-1410-410d-9b4e-dc5205f2b9d4-FY5PlG7I0XVJ",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } elseif ($mockmodestatus == "FAILED") {
                return $result = [
                    "response" => [
                        "statuscode" => "ERR",
                        "actcode" => null,
                        "status" =>
                            "Another Receiver Already Exists with the Same Name 004",
                        "data" => [
                            "Code" => "042",
                            "Message" =>
                                "Another Receiver Already Exists with the Same Name [004]",
                            "ReceiverId" => [],
                        ],
                        "timestamp" => "2024-02-01 16:25:31",
                        "ipay_uuid" =>"h0069b3b2ef2-a9df-4597-9a5e-e9bc5dda732d-ulq6CLUwhQgC",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } else {
                return $result = [];
            }
        } elseif ($value == "serviceCharge") {
            if ($mockmodestatus == "SUCCESS") {
                return $result = [
                    "response" => [
                        "statuscode" => "TXN",
                        "actcode" => null,
                        "status" => "Transaction Successful",
                        "data" => [
                            "transferAmount" => "10",
                            "serviceCharge" => "90",
                            "collectionAmount" => "100",
                            "collectionCurrency" => "INR",
                            "exchangeRate" => "1.6",
                            "payoutAmount" => "16",
                            "payoutCurrency" => "NPR",
                        ],
                        "timestamp" => "2024-02-01 16:30:22",
                        "ipay_uuid" =>"h0069b3b30af-6699-42eb-ac28-8d79159992dc-0erEkf36uU80",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } elseif ($mockmodestatus == "FAILED") {
                return $result = [
                    "response" => [
                        "statuscode" => "ERR",
                        "actcode" => null,
                        "status" => "The selected paymentMode is invalid.",
                        "data" => null,
                        "timestamp" => "2024-02-0116:28:37",
                        "ipay_uuid" =>"h0059b3b3010-38f0-4d6b-9453-1d629796caa7-cdZy7j8DQacJ",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } else {
                return $result = [];
            }
        } elseif ($value == "fundTransfer") {
            if ($mockmodestatus == "SUCCESS") {
                return $result = [
                    "response" => [
                        "statuscode" => "TXN",
                        "actcode" => null,
                        "status" => "Transaction Successful UAT mode",
                        "data" => [
                            "externalRef" => "098768328123459089008776866",
                            "poolReferenceId" => "1240201163246ZZBFB",
                            "txnValue" => "11.00",
                            "txnReferenceId" => "1240201163246ZZBFB",
                            "pool" => [
                                "account" => "7972538761",
                                "openingBal" => "234383.72",
                                "mode" => "DR",
                                "amount" => "117.30",
                                "closingBal" => "234266.42",
                            ],
                            "remitterName" => "POOJA BHAGWAN GAIKWAD",
                            "remitterMobile" => "7972538761",
                            "beneficiaryAccount" => "",
                            "beneficiaryBankName" => "",
                            "beneficiaryBranchId" => "",
                            "beneficiaryName" => "POOJA",
                            "exchangeRate" => "1.60",
                            "payoutAmount" => "17.60",
                            "payoutCurrency" => "NPR",
                            "paymentMode" => "Cash Payment",
                        ],
                        "timestamp" => "2024-02-01 16:32:46",
                        "ipay_uuid" =>"h0689b3b318a-df60-4d1b-933c-bc8b4f12071d-eevYtvMpFTjj",
                        "orderid" => "1240201163246ZZBFB",
                        "environment" => "SANDBOX",
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } elseif ($mockmodestatus == "PENDING") {
                return $result = [
                    "response" => [
                        "statuscode" => "TUP",
                        "actcode" => null,
                        "status" => "Transaction Under Process",
                        "data" => [
                            "externalRef" => "099968328123459089008776866",
                            "poolReferenceId" => "1240201163523JQYXQ",
                            "txnValue" => "12.00",
                            "txnReferenceId" => "1240201163523JQYXQ",
                            "pool" => [
                                "account" => "7972538761",
                                "openingBal" => "234266.42",
                                "mode" => "DR",
                                "amount" => "118.30",
                                "closingBal" => "234148.12",
                            ],
                            "remitterName" => "POOJA BHAGWAN GAIKWAD",
                            "remitterMobile" => "7972538761",
                            "beneficiaryAccount" => "",
                            "beneficiaryBankName" => "",
                            "beneficiaryBranchId" => "",
                            "beneficiaryName" => "POOJA",
                            "exchangeRate" => "1.60",
                            "payoutAmount" => "19.20",
                            "payoutCurrency" => "NPR",
                            "paymentMode" => "Cash Payment",
                        ],
                        "timestamp" => "2024-02-01 16:35:23",
                        "ipay_uuid" =>"h0069b3b3279-0028-4713-910c-131883d6dec9-wd5lxG8oEKnc",
                        "orderid" => "1240201163523JQYXQ",
                        "environment" => "SANDBOX",
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } elseif ($mockmodestatus == "FAILED") {
                return $result = [
                    "response" => [
                        "statuscode" => "ERR",
                        "actcode" => null,
                        "status" => "Transaction Failed UAT mode",
                        "data" => [
                            "externalRef" => "099968327623459089008776866",
                            "poolReferenceId" => "1240201163713AZWKG",
                            "txnValue" => "13.00",
                            "txnReferenceId" => "1240201163713AZWKG",
                            "pool" => [
                                "account" => "7972538761",
                                "openingBal" => "147437.50",
                                "mode" => "DR",
                                "amount" => "119.30",
                                "closingBal" => "147318.20",
                            ],
                            "remitterName" => "POOJA BHAGWAN GAIKWAD",
                            "remitterMobile" => "7972538761",
                            "beneficiaryAccount" => "",
                            "beneficiaryBankName" => "",
                            "beneficiaryBranchId" => "",
                            "beneficiaryName" => "POOJA",
                            "exchangeRate" => "1.60",
                            "payoutAmount" => "20.80",
                            "payoutCurrency" => "NPR",
                            "paymentMode" => "Cash Payment",
                        ],
                        "timestamp" => "2024-02-01 16:37:13",
                        "ipay_uuid" =>"h0059b3b3321-9d66-4f4c-9f52-001e1e32ce5a-uPRnIHP8CW9t",
                        "orderid" => "1240201163713XTZUW",
                        "environment" => "SANDBOX",
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } else {
                return $result = [];
            }
        } elseif ($value == "fetchTransactionStatus") {
            if ($mockmodestatus == "SUCCESS") {
                return $result = [
                    "response" => [
                        "statuscode" => "TXN",
                        "actcode" => null,
                        "status" => "Transaction Successful",
                        "data" => null,
                        "timestamp" => "2023-01-03 11:20:46",
                        "ipay_uuid" =>"h00698222a34-ce2c-4670-bb53-8386102793d5",
                        "orderid" => null,
                        "environment" => "LIVE",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } elseif ($mockmodestatus == "PENDING") {
                return $result = [
                    "response" => [
                        "statuscode"=>"TUP",
                        "actcode"=>null,
                        "status"=>"Action not allowed for respective IpayId.",
                        "data"=>null,
                        "timestamp"=>"2024-02-01 17:03:12","ipay_uuid"=>"h0689b3b3c6e-872e-47ff-b146-f79539c02630-1FyMZrEuJlIX",
                        "orderid"=>null,
                        "environment"=>"SANDBOX",
                        "internalCode"=>null
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } elseif ($mockmodestatus == "FAILED") {
                return $result = [
                    "response" => [
                        "statuscode" => "ERR",
                        "actcode" => null,
                        "status" => "Action not allowed for respective IpayId.",
                        "data" => null,
                        "timestamp" => "2024-02-01 16:40:29",
                        "ipay_uuid" =>"h0069b3b344e-17df-46e4-bfb8-cb540c89b54d-fygp08FmekJ5",
                        "orderid" => null,
                        "environment" => "SANDBOX",
                        "internalCode" => null,
                    ],
                    "error" => "",
                    "code" => 200,
                ];
            } else {
                return $result = [];
            }
        } else {
            return $result = [];
        }
    }
}
