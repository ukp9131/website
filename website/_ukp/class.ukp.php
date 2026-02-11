<?php

/**
 * - Ukp 라이브러리
 * - $option 옵션설정
 * - `bool [api_bool=false]`    true: json, false: html
 * - `bool [session_bool=true]` 세션사용여부
 * - `bool [cors_bool=false]`   cors 허용여부
 * 
 * require  2026.01.02 config.php
 * @version 2026.02.06
 * @since   PHP 5 >= 5.2.0, PHP 7, PHP 8
 * @author  ukp
 */
class Ukp {
// #region @ukp 필수설정
    /**
     * 서버 케릭터셋  
     *   
     * @version 2020.02.13
     * @var     string
     */
    private $charset;
    /**
     * 서버 타임존  
     *   
     * @version 2020.07.29
     * @var     string
     */
    private $time_zone;
// #endregion
// #region @ukp db
    /**
     * mysqli 접속정보  
     *   
     * @version 2020.07.10
     * @var     array
     */
    private $db_info;

    /**
     * mysqli insert_id  
     *   
     * @version 2020.07.10
     * @var     int
     */
    private $db_insert_id;

    /**
     * mysqli affected_rows  
     *   
     * @version 2020.07.10
     * @var     int
     */
    private $db_affected_rows;

    /**
     * mysqli last_query  
     *   
     * @version 2022.12.19
     * @var     string
     */
    private $db_last_query;
// #endregion
// #region @ukp input
    /**
     * 파일 업로드 상태값  
     *   
     * [code]: 업로드 결과코드  
     *         0 - 업로드한적 없음  
     *         1 - 업로드 성공  
     *         2 - 업로드파일 없음  
     *         3 - 업로드할 폴더 없음  
     *         4 - 허용확장자 없음  
     * [name]: 업로드 파일명  
     * [ext]: 업로드 파일 확장자  
     * [full_name]: 확장자 포함 파일명  
     * [src]: 업로드 경로  
     *   
     * @version 2020.02.13
     * @var     array
     */
    private $input_upload_info;
// #endregion
// #region @ukp common
    /**
     * api url  
     *   
     * @version 2025.03.06
     * @var     string
     */
    private $common_api_url;

    /**
     * api 토큰  
     *   
     * @version 2025.03.06
     * @var     string
     */
    private $common_api_token;

    /**
     * User-Agent(크롤링용)  
     *   
     * @version 2020.05.26
     * @var     string
     */
    private $common_user_agent;

    /**
     * 페이누리 암호화키  
     *   
     * @version 2020.02.13
     * @var     string
     */
    private $common_keyin_paynuri_crypto;

    /**
     * 웰컴페이 API키  
     *   
     * @version 2020.02.13
     * @var     string
     */
    private $common_keyin_welcome_api_key;

    /**
     * 웰컴페이 IV값  
     *   
     * @version 2020.02.13
     * @var     string
     */
    private $common_keyin_welcome_iv;

    /**
     * 원시그널 앱아이디  
     *   
     * @version 2020.02.13
     * @var     string
     */
    private $common_onesignal_app_id;

    /**
     * 원시그널 rest api 키  
     *   
     * @version 2024.10.29
     * @var     string
     */
    private $common_onesignal_rest_api_key;

    /**
     * 공공데이터포털 날씨 서비스키  
     *   
     * @version 2020.02.13
     * @var     string
     */
    private $common_godata_weather;

    /**
     * 공공데이터포털 휴일 서비스키  
     *   
     * @version 2020.09.11
     * @var     string
     */
    private $common_godata_holiday;

    /**
     * 카카오맵 REST API 키  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_kakao_rest_api;

    /**
     * 카카오 로그인 redirect url  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_kakao_redirect_url;

    /**
     * 카카오 로그인 REST API 키  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_kakao_rest_api;

    /**
     * 카카오 로그인 client secret  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_kakao_client_secret;

    /**
     * 네이버 로그인 redirect url  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_naver_redirect_url;

    /**
     * 네이버 로그인 client id  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_naver_client_id;

    /**
     * 네이버 로그인 client secret  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_naver_client_secret;

    /**
     * 페이스북 로그인 redirect url  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_facebook_redirect_url;

    /**
     * 페이스북 로그인 client id  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_facebook_client_id;

    /**
     * 페이스북 로그인 client secret  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_facebook_client_secret;

    /**
     * 구글 로그인 redirect url  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_google_redirect_url;

    /**
     * 구글 로그인 client id  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_google_client_id;

    /**
     * 구글 로그인 client secret  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_google_client_secret;

    /**
     * PASS 로그인 redirect url  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_pass_redirect_url;

    /**
     * PASS 로그인 client id  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_pass_client_id;

    /**
     * PASS 로그인 client secret  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_pass_client_secret;

    /**
     * 애플 로그인 redirect url  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_apple_redirect_url;

    /**
     * 애플 로그인 identifier(service id)  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_apple_identifier;

    /**
     * 애플 로그인 key id(key)  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_apple_key_id;

    /**
     * 애플 로그인 team id  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_apple_team_id;

    /**
     * 애플 로그인 private key file  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_apple_private_key_file;

    /**
     * 카페24 로그인 redirect url  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_cafe24_redirect_url;

    /**
     * 카페24 로그인 client id  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_cafe24_client_id;

    /**
     * 카페24 로그인 client secret  
     *   
     * @version 2025.01.17
     * @var     string
     */
    private $common_social_cafe24_client_secret;

    /**
     * 톡스토어 api 인증키  
     *   
     * @version 2021.05.24
     * @var     string
     */
    private $common_shop_kakao_admin_app_key;

    /**
     * esm 비밀키  
     *   
     * @version 2022.01.11
     * @var     string
     */
    private $common_shop_esm_secret_key;

    /**
     * 커머스 client id  
     *   
     * @version 2023.05.18
     * @var     string
     */
    private $common_shop_commerce_client_id;

    /**
     * 커머스 client secret  
     *   
     * @version 2023.05.18
     * @var     string
     */
    private $common_shop_commerce_client_secret;

    /**
     * 티몬 client id  
     *   
     * @version 2023.05.18
     * @var     string
     */
    private $common_shop_tmon_client_id;

    /**
     * 티몬 client secret  
     *   
     * @version 2023.05.18
     * @var     string
     */
    private $common_shop_tmon_client_secret;

    /**
     * 티몬 복호화 키  
     *   
     * @version 2023.05.18
     * @var     string
     */
    private $common_shop_tmon_secret_key;
// #endregion
// #region @ukp custom
    /**
     * asn1 integer  
     *   
     * @version 2021.03.10
     * @var     int
     */
    private $custom_asn1_integer;

    /**
     * asn1 sequence  
     *   
     * @version 2021.03.10
     * @var     int
     */
    private $custom_asn1_sequence;

    /**
     * asn1 bit string  
     *   
     * @version 2021.03.10
     * @var     int
     */
    private $custom_asn1_bit_string;

    /**
     * unique id 중복방지  
     *   
     * @version 2022.06.28
     * @var     int
     */
    private $custom_unique_index;

    /**
     * 사용자 정보  
     *   
     * @version 2025.10.24
     * @var     string
     */
    private $custom_user_info;

    /**
     * request  
     *   
     * @version 2025.08.05
     * @var     array
     */
    private $custom_request;

    /**
     * 스마트스토어 api url  
     *   
     * @version 2023.06.14
     * @var     string
     */
    private $custom_shop_smartstore_api_url;

    /**
     * 티몬 api url  
     *   
     * @version 2023.06.14
     * @var     string
     */
    private $custom_shop_tmon_api_url;

    /**
     * 위메프 api url  
     *   
     * @version 2023.06.14
     * @var     string
     */
    private $custom_shop_wemakeprice_api_url;

    /**
     * 스마트스토어 api 수집딜레이(마이크로초)  
     *   
     * @version 2023.06.14
     * @var     int
     */
    private $custom_shop_smartstore_api_delay;

    /**
     * 톡스토어 api 수집딜레이(마이크로초)  
     *   
     * @version 2023.07.10
     * @var     int
     */
    private $custom_shop_kakao_api_delay;

    /**
     * 주문/클레임정보  
     * 주문리스트에 결제일이 누락된 부분이 있는경우 구매일자 주문일, 아닌경우 결제일  
     * 선물하기 주문은 주문일과 결제일이 같음  
     *   
     * 상점별 기준(order_no / product_price / buy_dt / 선물주문여부)  
     * 스마트스토어: 상품주문번호 / 상품별 총 주문금액 / 결제일 / y  
     * 티몬: 주문번호-옵션번호 / 총 주문금액 / 결제일 / n  
     * ESM: 주문번호 / 정산예정금액 / 결제일 / y  
     * 쿠팡:주문번호-(vendorItemId 또는 targetItemId) / 주문금액 - 할인금액 + 쿠팡지원할인 / 결제일 / n  
     * 위메프: 옵션주문번호 / 판매단가 * 수량 / 결제일 / n  
     * 11번가: 주문번호-주문순번 / 판매단가 * 수량 + 옵션가 / 주문일 / y  
     * 톡스토어: 주문번호 / 총 주문금액 - 총 할인금액 / 결제일 / n  
     * 인터파크: 주문번호-주문순번 / 판매단가 * 수량 / 결제일 / n  
     * 롯데ON: 주문번호-주문순번 / 판매금액 / 결제일 / n  
     * 카페24: ord-item-code / 상품구매금액(계정방식 배송중,배송완료는 총 상품구매금액) / 주문일 / n  
     * 고도몰5: 상품주문번호 / 총 상품금액 / 결제일 / n  
     * 샵바이: 주문상품옵션번호 / 즉시할인가 * 수량 / 주문일 / n  
     * SSG: 주문번호-주문순번 / 판매단가 * 수량 / 결제일 / n  
     * 셀러허브: 주문아이템번호(sno) / 결제가격(sprice) / 주문일 / n  
     * 멸치쇼핑: 주문번호-상품번호(ordercd-productcd) / 정산예정금액(calamount + chargedshippingfee) / 주문일 / n  
     * 아임웹: 품목주문번호 / 옵션가격 / 주문일 / n  
     * 블로그페이: 주문상품번호 / 상품주문가격 / 주문일 / n  
     * GS SHOP: 주문번호 / 협력사지급금액 / 주문일 / n  
     *   
     * [status](주문,클레임)(필수): 선물수락전-gift, 신규-new, 확인-confirm, 배송대기,배송중-progress 배송완료,구매확정-end  
     *                              취소요청-cancel, 반품요청-refund, 교환요청-exchange  
     *                              취소처리-cancel_end, 반품처리-refund_end, 교환처리-exchange_end  
     * [code](주문): 주문처리코드(^구분자)  
     * [order_no](주문,클레임)(필수): 주문고유번호  
     * [shop_order_no](주문,클레임): 상점주문번호  
     * [buy_code](주문): 개인통관고유부호  
     * [buy_dt](주문)(필수): 구매일자  
     * [buy_name](주문,클레임): 주문자명  
     * [buy_tel](주문): 주문자 전화번호  
     * [buy_phone](주문): 주문자 핸드폰번호  
     * [product_code](주문): 판매자코드  
     * [product_url](주문,클레임): 상품URL  
     * [product_name](주문,클레임): 상품명  
     * [product_option](주문,클레임): 옵션  
     * [product_option_code](주문): 옵션코드  
     * [product_cnt](주문,클레임)(필수): 수량  
     * [product_price](주문,클레임)(필수): 총금액  
     * [to_dt](주문): 발송예정일  
     * [to_name](주문,클레임): 수취인명  
     * [to_tel](주문): 수취인 전화번호  
     * [to_phone](주문): 수취인 핸드폰번호  
     * [to_postcode](주문): 우편번호  
     * [to_address](주문): 수취인 주소  
     * [to_message](주문): 배송메세지  
     * [to_type](주문): 배송비지불방법  
     * [to_price](주문): 배송비  
     * [delivery](주문): 배송코드  
     * [invoicing_no](주문): 송장번호  
     * [claim_dt](클레임)(필수): 클레임요청일자  
     * [claim_reason](클레임): 클레임사유  
     * [search_date](주문,클레임)(필수): 검색기준일  
     *   
     * @version 2023.07.10
     * @var     array
     */
    private $custom_shop_order_row;

    /**
     * 문의정보  
     * [question_code]: 문의처리번호  
     * [question_no](필수): 문의고유번호  
     * [question_title]: 문의제목  
     * [question_content]: 문의내용  
     * [question_dt](필수): 문의일자  
     * [product_url]: 상품URL  
     * [product_name]: 상품명  
     *   
     * @version 2023.07.10
     * @var     array
     */
    private $custom_shop_question_row;

    /**
     * 상품url  
     * [smartstore]: 스마트스토어  
     * [tmon]: 티몬  
     * [esm_g]: 지마켓  
     * [esm_a]: 옥션  
     * [coupang]: 쿠팡  
     * [wemakeprice2]: 위메프  
     * [11st]: 11번가  
     * [kakao]: 톡스토어  
     * [interpark]: 인터파크  
     * [lotte_on]: 롯데ON  
     * [cafe24]: 카페24  
     * [godo5_pro]: 고도몰5  
     * [godo_shopby]: 샵바이  
     * [ssg]: SSG  
     * [sellerhub]: 셀러허브  
     * [smelchi]: 멸치쇼핑  
     * [imweb]: 아임웹  
     * [blogpay]: 블로그페이  
     * [gsshop]: GS SHOP  
     *   
     * @version 2023.07.10
     * @var     array
     */
    private $custom_shop_product_url;
// #endregion
// #region @ukp 필수함수
    /**
     * 생성자  
     *   
     * require  2025.10.24 custom_error_handler custom_error_handler_fatal custom_parking session_start
     * @version 2025.10.24
     * 
     * @param array $option 옵션설정  
     * `bool [api_bool=false]`    true - json, false - html(기본값: false)  
     * `bool [session_bool=true]` 세션사용여부(기본값: true)  
     * `bool [cors_bool=false]`   cors 허용여부(기본값: false)
     */
    function __construct($option = array()) {
        //에러핸들러 설정 전에 발생하는 에러 무시
        error_reporting(0);
        //$option 설정
        if (!is_array($option)) {
            $option = array();
        }
        $api_bool = isset($option["api_bool"]) ? $option["api_bool"] : false;
        $session_bool = isset($option["session_bool"]) ? $option["session_bool"] : true;
        $cors_bool = isset($option["cors_bool"]) ? $option["cors_bool"] : false;
        //umask 설정
        umask(0);
        //config 호출
        $config = array();
        require dirname(__FILE__) . "/config.php";
        //일반변수 초기화(접두어 common)
        foreach ($config as $k => $v) {
            if (substr($k, 0, 6) != "common") {
                continue;
            }
            $this->{$k} = $v;
        }
        //타임존 설정
        $this->time_zone = $config["time_zone"];
        date_default_timezone_set($this->time_zone);
        //점검중
        $this->custom_parking($config["parking_start_dt"], $config["parking_end_dt"]);
        //케릭터셋 설정
        $this->charset = $config["charset"];
        if ($api_bool) {
            header("Content-Type: application/json; charset={$this->charset}");
        } else {
            header("Content-Type: text/html; charset={$this->charset}");
        }
        //cors 설정
        if ($cors_bool) {
            header("Access-Control-Allow-Origin: *");
        }
        //기간지난 파일 삭제
        $date = date("Y_m_d");
        $arr = array(
            array(dirname(__FILE__) . "/log", intval($config["log_limit_day"])),
            array(dirname(__FILE__) . "/temp", intval($config["temp_limit_day"]))
        );
        if (mkdir(dirname(__FILE__) . "/temp/{$date}")) {
            foreach ($arr as $temp) {
                $dh = opendir($temp[0]);
                while (($file = readdir($dh)) !== false) {
                    //삭제 안할 파일
                    if (in_array($file, array(".", "..", "index.html", "index.php"))) {
                        continue;
                    }
                    $dest_path = "{$temp[0]}/{$file}";
                    if (is_dir($dest_path) && $file != $date) {
                        rmdir($dest_path);
                        continue;
                    }
                    $fat = filemtime($dest_path);
                    $time = strtotime("-{$temp[1]} day");
                    if ($fat < $time) {
                        unlink($dest_path);
                    }
                }
                closedir($dh);
            }
        }
        //에러핸들러 설정
        error_reporting(E_ALL);
        $this->custom_user_info = "";
        set_error_handler(array($this, "custom_error_handler"));
        register_shutdown_function(array($this, "custom_error_handler_fatal"));
        ini_set("display_errors", 0);
        //db 접속정보
        $this->db_info = $config["db"];
        $this->db_insert_id = 0;
        $this->db_affected_rows = 0;
        //mysql report
        mysqli_report(MYSQLI_REPORT_OFF);
        //session_start
        if ($session_bool) {
            $session_time = 0;
            $session_dir = null;
            //세션시간 설정한경우
            if ($config["session_limit_time"] > 0) {
                $session_time = $config["session_limit_time"];
                $session_dir = dirname(__FILE__) . "/temp";
            }
            $this->session_start($session_time, $session_dir);
        }
        //파일업로드 코드 설정
        $this->input_upload_info = array(
            "code" => "0",
            "name" => "",
            "ext" => "",
            "full_name" => "",
            "src" => ""
        );
        //asn1 세팅
        $this->custom_asn1_integer = 0x02;
        $this->custom_asn1_sequence = 0x10;
        $this->custom_asn1_bit_string = 0x03;
        //preg 제한
        ini_set("pcre.backtrack_limit", -1);
        //unique id 중복방지
        $this->custom_unique_index = 0;
        //setting cookie
        $this->custom_set_cookie();
        //setting request
        $this->custom_set_request();
        //api url 세팅
        //$this->custom_shop_smartstore_api_url = "https://sandbox-api.commerce.naver.com/partner"; //스마트스토어 개발
        $this->custom_shop_smartstore_api_url = "https://api.commerce.naver.com/partner"; //스마트스토어 운영
        //$this->custom_shop_tmon_api_url = "http://interworkapi-test.tmon.co.kr"; //티몬 개발
        $this->custom_shop_tmon_api_url = "https://interworkapi.tmon.co.kr"; //티몬 운영
        //$this->custom_shop_wemakeprice_api_url = "https://wapi-stg.wemakeprice.com"; //위메프 개발
        $this->custom_shop_wemakeprice_api_url = "https://w-api.wemakeprice.com"; //위메프 운영
        //api 딜레이(마이크로초)
        $this->custom_shop_smartstore_api_delay = 100000;
        $this->custom_shop_kakao_api_delay = 100000;
        //주문, 클레임, 문의정보 초기화
        $this->custom_shop_order_row = array(
            "status" => "",
            "code" => "",
            "order_no" => "",
            "shop_order_no" => "",
            "buy_code" => "",
            "buy_dt" => "",
            "buy_name" => "",
            "buy_tel" => "",
            "buy_phone" => "",
            "product_code" => "",
            "product_url" => "",
            "product_name" => "",
            "product_option" => "",
            "product_option_code" => "",
            "product_cnt" => "",
            "product_price" => "",
            "to_dt" => "",
            "to_name" => "",
            "to_tel" => "",
            "to_phone" => "",
            "to_postcode" => "",
            "to_address" => "",
            "to_message" => "",
            "to_type" => "",
            "to_price" => "",
            "delivery" => "",
            "invoicing_no" => "",
            "claim_dt" => "",
            "claim_reason" => "",
            "search_date" => ""
        );
        $this->custom_shop_question_row = array(
            "question_code" => "",
            "question_no" => "",
            "question_title" => "",
            "question_content" => "",
            "question_dt" => "",
            "product_url" => "",
            "product_name" => ""
        );
        //상품url
        $this->custom_shop_product_url = array(
            "smartstore" => "https://smartstore.naver.com/main/products/",
            "tmon" => "https://www.tmon.co.kr/deal/",
            "esm_g" => "https://item.gmarket.co.kr/Item?goodscode=",
            "esm_a" => "https://itempage3.auction.co.kr/DetailView.aspx?itemno=",
            "coupang" => "https://www.coupang.com/vp/products/777?vendorItemId=",
            "wemakeprice2" => "https://front.wemakeprice.com/product/",
            "11st" => "https://www.11st.co.kr/products/",
            "kakao" => "https://store.kakao.com/__php__id__/products/",
            "interpark" => "https://shopping.interpark.com/product/productInfo.do?prdNo=",
            "lotte_on" => "https://www.lotteon.com/p/product/",
            "cafe24" => "https://__php__id__.cafe24.com/shop__php__shop_no__/front/php/product.php?product_no=",
            "godo5_pro" => "__php__extra__/goods/goods_view.php?goodsNo=",
            "godo_shopby" => "__php__url__/product-detail?productNo=",
            "ssg" => "https://www.ssg.com/item/itemView.ssg?itemId=",
            "sellerhub" => "https://admin.sellerhub.co.kr/shop/goods/goods_view.php?goodsno=",
            "smelchi" => "http://www.smelchi.com/product/detail?productCd=",
            "imweb" => "__php__url__/shop/?idx=",
            "blogpay" => "https://__php__id__.shop.blogpay.co.kr/good/product_view?goodNum=",
            "gsshop" => "https://www.gsshop.com/prd/prd.gs?prdid="
        );
    }

    /**
     * 소멸자  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     * 
     */
    function __destruct() {
    }
// #endregion
// #region @ukp custom
    /**
     * 커스텀 xml요소 추가(encode_xml에서 사용)  
     *   
     * require  2025.01.17 custom_add_xml_element
     * @version 2025.01.17
     *
     * @param SimpleXMLElement $xml SimpleXMLElement 객체
     * @param array            $arr 추가할 배열
     */
    function custom_add_xml_element(&$xml, $arr) {
        foreach ($arr as $k => $v) {
            //요소가 숫자인경우(예외처리)
            if (is_numeric($k)) {
                $k = "item{$k}";
            }
            //자식이 배열인경우
            if (is_array($v)) {
                //리스트형 배열인경우
                if (isset($v[0])) {
                    foreach ($v as $temp) {
                        $this->custom_add_xml_element($xml, array($k => $temp));
                    }
                }
                //객체형 배열인경우
                else {
                    $sub_xml = $xml->addChild($k);
                    $this->custom_add_xml_element($sub_xml, $v);
                }
            }
            //자식이 값인경우
            else {
                $xml->addChild("{$k}", htmlspecialchars("{$v}"));
            }
        }
    }

    /**
     * api로 함수 실행  
     * 이진데이터는 base64 인코딩해서 전송  
     * 변수참조반환 함수인경우 반환값이 bool, 변수참조값이 return
     *   
     * require  2025.05.30 array_value decode_json encode_json
     * @version 2025.05.30
     *
     * @param  string $func    실행할 함수
     * @param  array  $param   함수에 전달할 파라미터 리스트
     * @return array  [bool]   접속성공여부  
     *                [return] 함수결과값
     */
    function custom_api_func($func, $param) {
        //실행 전 처리
        if ($func == "openssl_verify") {
            $param[1] = base64_encode($param[1]);
        }
        $curl_url = $this->common_api_url;
        $curl_header = array(
            "Content-Type: application/x-www-form-urlencoded"
        );
        $curl_query = http_build_query(array(
            "token" => $this->common_api_token,
            "func" => $func,
            "param" => $this->encode_json($param)
        ));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $curl_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_query);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_header);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $content = curl_exec($ch);
        $curl_info = curl_getinfo($ch);
        if ($this->array_value($curl_info, "http_code") != 200) {
            return array(
                "bool" => false,
                "return" => null
            );
        }
        $arr = $this->decode_json($content);
        //실행 후 처리
        //openssl_sign 함수는 이진데이터를 반환하면서 변수참조반환 함수임
        if ($func == "openssl_sign") {
            $arr["return"] = base64_decode($arr["return"]);
        }
        return $arr;
    }

    /**
     * 커스텀 에러 핸들러  
     *   
     * require  2025.10.24 log_message
     * @version 2025.10.24
     *
     * @param  int    $errno   에러번호
     * @param  string $errstr  에러메시지
     * @param  string $errfile 에러파일
     * @param  int    $errline 에러줄
     * @return bool
     */
    function custom_error_handler($errno, $errstr, $errfile, $errline) {
        error_reporting(0);
        $backtrace_arr = debug_backtrace();
        $backtrace = "";
        foreach ($backtrace_arr as $k => $v) {
            if (isset($v["file"]) && isset($v["line"])) {
                $backtrace .= "\n{$v["file"]} Line {$v["line"]}";
            }
        }
        $message = "Error: [{$errno}] {$errstr} In {$errfile} Line {$errline}\nBacktrace: {$backtrace}";
        $this->log_message($message, "error");
        error_reporting(E_ALL);
        return true;
    }

    /**
     * 커스텀 에러 핸들러  
     *   
     * require  2025.10.24 array_value log_message
     * @version 2025.10.24
     *
     * @return bool
     */
    function custom_error_handler_fatal() {
        $error = error_get_last();
        if ($this->array_value($error, "type") != E_ERROR) {
            return true;
        }
        $message = "Fatal error: {$error["message"]} In {$error["file"]} Line {$error["line"]}";
        $this->log_message($message, "error");
        return true;
    }

    /**
     * 점검중인경우 생성자에서 함수실행  
     * 점검일시는 값이 있는경우에만 노출  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     *
     * @param string $start_dt 점검시작일시(YYYY-mm-dd HH:ii:ss)
     * @param string $end_dt   점검종료일시(YYYY-mm-dd HH:ii:ss)
     */
    function custom_parking($start_dt = "", $end_dt = "") {
        $now_dt = date("Y-m-d H:i:s");
        if (($start_dt != "" && $now_dt < $start_dt) || $end_dt == "" || $end_dt < $now_dt) {
            return;
        }
        $dt_html = "";
        if ($start_dt != "" && $end_dt != "" && $start_dt < $end_dt) {
            if (substr($start_dt, 0, 10) == substr($end_dt, 0, 10)) {
                $dt_text = date("Y년 m월 d일", strtotime($start_dt)) . "<br>";
                $dt_text .= date("H시 i분", strtotime($start_dt)) . " ~ " . date("H시 i분", strtotime($end_dt)) . "<br>";
            } else {
                $dt_text = date("Y년 m월 d일 H시 i분", strtotime($start_dt)) . "<br>~<br>";
                $dt_text .= date("Y년 m월 d일 H시 i분", strtotime($end_dt)) . "<br>";
            }
            $diff = strtotime($end_dt) - strtotime($start_dt);
            if ($diff < 3600) {
                $dt_text .= "(약 " . round($diff / 60) . "분)";
            } else if ($diff < 86400) {
                $dt_text .= "(약 " . intval($diff / 3600) . "시간" . ($diff % 3600 == 0 ? "" : (" " . round(($diff % 3600) / 60)) . "분") . ")";
            } else {
                $dt_text .= "(약 " . round($diff / 86400) . "일)";
            }
            $dt_html = "<div class='d_title'>예상 서버 점검시간</div><div class='d_content'>{$dt_text}</div>";
        } else {
            $dt_text = date("Y년 m월 d일 H시 i분", strtotime($end_dt));
            $dt_html = "<div class='d_title'>예상 점검 종료일시</div><div class='d_content'>{$dt_text}</div>";
        }
        $meta = "<meta charset='utf-8'><meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=no'>";
        $style = "*{box-sizing:border-box;margin:0;padding:0;font-family:'Noto Sans KR',sans-serif;text-align:center;}body{min-height:100vh;display:flex;}";
        $style .= ".box{margin:auto;}.icon{border:3px solid black;width:40px;height:40px;line-height:34px;margin:0 auto;font-size:24px;font-weight:900;border-radius:20px;margin-bottom:6px;}";
        $style .= ".title{font-size:24px;font-weight:900;padding:4px 20px;border-bottom:2px solid black;display:inline-block;}.red{color:#cd0000;}.content{font-size:12px;padding-top:10px;}";
        $style .= ".d_title{padding-top:20px;font-size:18px;color:#cd0000;font-weight:900;}.d_content{padding-top:4px;font-size:12px;font-weight:bold;}";
        $css = "<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Noto+Sans+KR&display=swap'><style>{$style}</style>";
        $body = "<div class='box'><div class='icon'>!</div><div class='title'>시스템 <span class='red'>점검중</span>입니다</div><div class='content'>서비스 이용에 불편을 드려서 대단히 죄송합니다<br>조속한 시간 내에 서비스를 정상화 시키도록 하겠습니다</div>";
        echo "<!DOCTYPE html><html><head>{$meta}{$css}</head><body>{$body}{$dt_html}</body></html>";
        exit;
    }

    /**
     * cookie 변수 세팅  
     * magic_quotes_gpc on 인경우 stripslashes 처리  
     * $_COOKIE 변수 직접 수정  
     *   
     * require  2025.08.05 is_magic_quotes_gpc
     * @version 2025.08.05
     */
    function custom_set_cookie() {
        if (!$this->is_magic_quotes_gpc()) {
            return;
        }
        foreach ($_COOKIE as $k => $v) {
            $_COOKIE[$k] = stripslashes($v);
        }
    }

    /**
     * request 변수 세팅  
     * magic_quotes_gpc on 인경우 stripslashes 처리  
     * post > get  
     *   
     * require  2025.08.05 is_magic_quotes_gpc
     * @version 2025.08.05
     */
    function custom_set_request() {
        $request = $_REQUEST;
        foreach ($_COOKIE as $k => $v) {
            unset($request[$k]);
            if (isset($_POST[$k])) {
                $request[$k] = $_POST[$k];
            } else if (isset($_GET[$k])) {
                $request[$k] = $_GET[$k];
            }
        }
        if ($this->is_magic_quotes_gpc()) {
            $stack = array(&$request);
            while (isset($stack[0])) {
                $current = &$stack[0];
                foreach ($current as $k => $v) {
                    if (is_array($v)) {
                        $stack[] = &$current[$k];
                        continue;
                    }
                    $current[$k] = stripslashes($v);
                }
                unset($current);
                array_shift($stack);
            }
        }
        $this->custom_request = $request;
    }
// #endregion
// #region @ukp array
    /**
     * 배열 추가  
     *   
     * require  2025.01.17 array_change
     * @version 2025.01.17
     *
     * @param  array  $arr         배열
     * @param  array  $add_arr     추가배열
     * @param  string $arr_key     배열 키
     * @param  string $add_arr_key 추가배열 키
     * @return array               추가된 배열
     */
    function array_add($arr, $add_arr, $arr_key, $add_arr_key) {
        $return_arr = array();
        $add_arr = $this->array_change($add_arr, $arr_key, false);
        foreach ($arr as $temp) {
            $temp[$add_arr_key] = isset($add_arr[$temp[$arr_key]]) ? $add_arr[$temp[$arr_key]] : array();
            $return_arr[] = $temp;
        }
        return $return_arr;
    }

    /**
     * 연관배열정렬(같은 인덱스는 임의로 정렬, 문자열 기준으로 정렬, 숫자정렬은 10.2자리수까지)  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     *
     * @param  array  $arr      정렬할 배열
     * @param  string $key      정렬기준 배열 인덱스
     * @param  bool   $asc_bool true-오름차순, false-내림차순
     * @return array            정렬된 배열, 인덱스 존재하지 않는경우 빈 배열
     */
    function array_asort($arr, $key, $asc_bool = true) {
        //임시배열 채우기
        $temp_arr = array();
        $i = 0;
        foreach ($arr as $k => $v) {
            //인덱스 없는경우 예외처리
            if (!isset($v[$key])) {
                return array();
            }
            //숫자인경우 앞에 0 붙이기
            $temp_key = $v[$key];
            if (floatval($v[$key]) . "" == $v[$key]) {
                $temp_key = sprintf("%013.2lf", $v[$key]);
            }
            $temp_arr[$k] = "{$temp_key}__{$i}";
            $i++;
        }
        if ($asc_bool) {
            asort($temp_arr);
        } else {
            arsort($temp_arr);
        }
        //반환배열 채우기
        $return_arr = array();
        foreach ($temp_arr as $k => $v) {
            $return_arr[$k] = $arr[$k];
        }
        return $return_arr;
    }

    /**
     * 배열 치환  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     *
     * @param  array  $arr         배열
     * @param  string $arr_key     배열 키
     * @param  bool   $unique_bool true - 값으로, false - 배열로
     * @return array               치환된 배열
     */
    function array_change($arr, $arr_key, $unique_bool = true) {
        $return_arr = array();
        if ($unique_bool) {
            foreach ($arr as $temp) {
                $return_arr[$temp[$arr_key]] = $temp;
            }
        } else {
            foreach ($arr as $temp) {
                if (!isset($return_arr[$temp[$arr_key]])) {
                    $return_arr[$temp[$arr_key]] = array();
                }
                $return_arr[$temp[$arr_key]][] = $temp;
            }
        }
        return $return_arr;
    }

    /**
     * 배열 값 찾아서 삭제  
     * 값이 중복인경우 처음 나오는 값만 삭제  
     * 연관배열에서 사용 불가능  
     *   
     * require  2025.03.06
     * @version 2025.03.06
     *
     * @param  array  $arr    원본배열
     * @param  string $search 찾을 값
     * @return array          값 삭제된 배열, 값이 없는경우 원본배열
     */
    function array_search_delete($arr, $search) {
        if (!in_array($search, $arr)) {
            return $arr;
        }
        $key = array_search($search, $arr);
        array_splice($arr, $key, 1);
        return $arr;
    }

    /**
     * 배열정렬(같은 인덱스는 임의로 정렬, 문자열 기준으로 정렬, 숫자정렬은 10.2자리수까지)  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     *
     * @param  array  $arr      정렬할 배열
     * @param  string $key      정렬기준 배열 인덱스
     * @param  bool   $asc_bool true-오름차순, false-내림차순
     * @return array            정렬된 배열, 인덱스 존재하지 않는경우 빈 배열
     */
    function array_sort($arr, $key, $asc_bool = true) {
        //임시배열 채우기
        $temp_arr = array();
        foreach ($arr as $k => $v) {
            //인덱스 없는경우 예외처리
            if (!isset($v[$key])) {
                return array();
            }
            //숫자인경우 앞에 0 붙이기
            $temp_key = $v[$key];
            if (floatval($v[$key]) . "" == $v[$key]) {
                $temp_key = sprintf("%013.2lf", $v[$key]);
            }
            $temp_arr["{$temp_key}__{$k}"] = $v;
        }
        if ($asc_bool) {
            ksort($temp_arr);
        } else {
            krsort($temp_arr);
        }
        //반환배열 채우기
        $arr = array();
        foreach ($temp_arr as $temp) {
            $arr[] = $temp;
        }
        return $arr;
    }

    /**
     * 배열값 반환, stdClass인경우 배열로 변환해서 확인  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     *
     * @param  array|object $var        배열 또는 stdClass
     * @param  string       $key        인덱스
     * @param  bool         $array_bool 반환값형태, true - 배열, false - 문자열
     * @return array|string
     */
    function array_value($var, $key, $array_bool = false) {
        if (is_object($var)) {
            //객체 배열 변환
            $var = get_object_vars($var);
        }
        if (is_array($var) && isset($var[$key])) {
            if ($array_bool) {
                //배열인경우 문자열이면 0번째 배열에 들어간다.
                return is_array($var[$key]) ? $var[$key] : array($var[$key]);
            } else {
                //문자열인경우 배열이면 빈 문자열이 된다.
                return is_array($var[$key]) ? "" : $var[$key];
            }
        } else if ($array_bool) {
            return array();
        } else {
            return "";
        }
    }
// #endregion
// #region @ukp convert
    /**
     * base32 to hex  
     *   
     * require  2025.10.24
     * @version 2025.10.24
     * 
     * @param  string $base32 base32 문자열
     * @return string         hex 문자열
     */
    function convert_base32_hex($base32) {
        $map = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ234567");
        $flipped_map = array_flip($map);
        $base32_arr = str_split(strtoupper($base32));
        $bits = "";
        $hex = "";
        foreach ($base32_arr as $temp) {
            $bits .= str_pad(decbin(isset($flipped_map[$temp]) ? $flipped_map[$temp] : "0"), 5, '0', STR_PAD_LEFT);
        }
        $bits_arr = str_split($bits, 4);
        foreach ($bits_arr as $temp) {
            if (strlen($temp) < 4) {
                break;
            }
            $hex .= dechex(bindec($temp));
        }
        return $hex;
    }

    /**
     * - 로컬시간 다른 타임존 시간으로 변환
     * 
     * require  2025.11.10
     * @version 2025.11.10
     * 
     * @param  string $local_dt  로컬시간(YYYY-mm-dd HH:ii:ss)
     * @param  string $to        변경할 타임존 (+09:00 -05:00 등)
     * @param  string $from      변환전 타임존 (+09:00 -05:00 등), null인경우 서버 타임존
     * @return string            변경된 로컬시간(YYYY-mm-dd HH:ii:ss)
     */
    function convert_localtime($local_dt, $to, $from = null) {
        if ($from === null) {
            $tz = new DateTimeZone($this->time_zone);
            $date = new DateTime("now", $tz);
            $from = $date->format("P");
        }
        $from_calc = intval(substr($from, 0, 1) . 1);
        $to_calc = intval(substr($to, 0, 1) . 1);
        $diff_hour = intval($to_calc * substr($to, 1, 2)) - intval($from_calc * substr($from, 1, 2));
        $diff_minute = intval($to_calc * substr($to, 4, 2)) - intval($from_calc * substr($from, 4, 2));
        return date("Y-m-d H:i:s", strtotime("{$local_dt} {$diff_hour} hour {$diff_minute} minute"));
    }

    /**
     * rsa ne to public key  
     *   
     * require  2025.10.24
     * @version 2025.10.24
     * 
     * @param  string $n n(base64 or url safe)
     * @param  string $e e(base64 or url safe)
     * @return string    public key
     */
    function convert_ne_pk($n, $e) {
        $n = str_replace(array("-", "_"), array("+", "/"), $n);
        $e = str_replace(array("-", "_"), array("+", "/"), $e);
        $pk = "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA{$n}ID{$e}";
        //=문자 추가
        for ($i = (strlen($pk) - 1) % 4; $i < 3; $i++) {
            $pk = "{$pk}=";
        }
        //개행추가
        $pk = implode("\n", str_split($pk, 64));
        $public_key = "-----BEGIN PUBLIC KEY-----\n{$pk}\n-----END PUBLIC KEY-----";
        return $public_key;
    }

    /**
     * public key to rsa ne  
     *   
     * require  2025.10.24 encode_base64
     * @version 2025.10.24
     * 
     * @param  string $public_key    public key
     * @param  bool   $url_safe_bool true: url safe, false: base64
     * @return array                 [n] - n(base64 or url safe)<br>
     *                               [e] - e(base64 or url safe)
     */
    function convert_pk_ne($public_key, $url_safe_bool = true) {
        $return_arr = array(
            "n" => "",
            "e" => ""
        );
        $key = openssl_pkey_get_public($public_key);
        if ($key === false) {
            return $return_arr;
        }
        $detail = openssl_pkey_get_details($key);
        if (!isset($detail["rsa"])) {
            return $return_arr;
        }
        $return_arr["n"] = $this->encode_base64($detail["rsa"]["n"], $url_safe_bool);
        $return_arr["e"] = $this->encode_base64($detail["rsa"]["e"], $url_safe_bool);
        return $return_arr;
    }

    /**
     * 개행문자, &nbsp; 공백변환  
     *   
     * require  2025.10.24
     * @version 2025.10.24
     *
     * @param  string $text 변환할 문자열
     * @return string       변환된 문자열
     */
    function convert_nl_space($text) {
        return str_replace(array("&nbsp;", "\r\n", "\r", "\n"), " ", $text);
    }
// #endregion
// #region @ukp cookie
    /**
     * 쿠키 값 불러오기  
     *   
     * require  2025.08.05
     * @version 2025.08.05
     *
     * @param  string       $key 키
     * @return string|array      값
     */
    function cookie_get($key = "") {
        if ($key == "") {
            return $_COOKIE;
        }
        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : "";
    }

    /**
     * 쿠키 저장  
     *   
     * require  2025.08.05
     * @version 2025.08.05
     *
     * @param string $key   키
     * @param string $value 값
     */
    function cookie_set($key, $value) {
        setcookie($key, $value, 0, "/");
        $_COOKIE[$key] = $value;
    }

    /**
     * 쿠키 제거  
     *   
     * require  2025.01.17 cookie_get
     * @version 2025.01.17
     *
     * @param string $key
     */
    function cookie_unset($key = "") {
        if ($key == "") {
            $cookie = $this->cookie_get();
        } else if (isset($_COOKIE[$key])) {
            $cookie = array(
                $key => $this->cookie_get("key")
            );
        } else {
            $cookie = array();
        }
        foreach ($cookie as $k => $v) {
            setcookie($k, "", 1, "/");
            unset($_COOKIE[$k]);
        }
    }
// #endregion
// #region @ukp db
    /**
     * - 쿼리문에 테이블 접두어 추가
     * - select, insert, update, delete 쿼리문만 가능
     * 
     * require  2026.01.02
     * @version 2026.01.02
     *
     * @param  string $sql    테이블 접두어 추가할 sql
     * @param  string $prefix 테이블 접두어
     * @return string         접두어 추가된 쿼리문
     */
    function db_add_prefix($sql, $prefix = "") {
        if ($prefix == "") {
            return $sql;
        }
        //문자열 치환
        preg_match_all("/(?<!\\\\)'([\S\s]*?)(?:[^\\\\]*\\\\\\\\)*(?<!\\\\)'/", $sql, $text_arr);
        foreach ($text_arr[0] as $k => $v) {
            //한개씩 변환하기 위에 preg_replace 사용
            $sql = preg_replace('/' . preg_quote($v, "/") . '/', '\\$' . $k . '\\$', $sql, 1);
        }
        //접두어 추가
        $pattern = "/(from(?!\s+dual)|join|insert\s+into|update)(\s+`?)([^\(])/i";
        $replacement = '${1}${2}' . $prefix . '${3}';
        $sql = preg_replace($pattern, $replacement, $sql);
        //문자열복구(역순)
        $reverse_arr = array_reverse($text_arr[0]);
        $cnt = count($reverse_arr) - 1;
        foreach ($reverse_arr as $k => $v) {
            //한개씩 변환하기 위에 preg_replace 사용
            $sql = preg_replace('/' . preg_quote('$' . ($cnt - $k) . '$', "/") . '/', $v, $sql, 1);
        }
        return $sql;
    }

    /**
     * - row 배열에 테이블 날짜설정 추가
     * 
     * require  2026.01.02
     * @version 2026.01.02
     *
     * @param  array $row    테이블
     * @param  array $option 옵션
     * - `array [date=array()]`     date 컬럼 리스트
     * - `array [time=array()]`     time 컬럼 리스트
     * - `array [datetime=array()]` datetime 컬럼 리스트
     * @return array         날짜설정 추가된 row 배열
     */
    function db_add_row($row, $option = array()) {
        //컬럼 찾기용 배열 생성
        $find_row = array();
        foreach ($row as $k => $v) {
            $temp = explode(" ", trim($k));
            $find_row[] = trim(str_replace("`", "", strtolower($temp[0])));
        }
        $arr = array(
            "date" => "date_format(now(), '%Y%m%d')",
            "time" => "date_format(now(), '%H%i%s')",
            "datetime" => "date_format(now(), '%Y%m%d%H%i%s')"
        );
        foreach ($arr as $k => $v) {
            if (!isset($option[$k])) {
                continue;
            }
            foreach ($option[$k] as $temp) {
                if (in_array($temp, $find_row)) {
                    continue;
                }
                $key = "{$temp} is";
                $row[$key] = $v;
            }
        }
        return $row;
    }

    /**
     * - 테이블 추가정보 반환
     * - 컬럼명, 접두어 trim 처리 및 컬럼명 소문자 변환
     * 
     * require  2026.01.02 array_value
     * @version 2026.01.02
     *
     * @param  string $table        테이블, 없는 테이블인경우 기본 db 설정
     * @param  string $database     데이터베이스, default가 기본 db
     * @return array                테이블 추가정보 배열
     * - `string [prefix=""]`
     * - `string [delete_flag=""]`
     * - `array  [insert_date=array()]`
     * - `array  [insert_time=array()]`
     * - `array  [insert_dt=array()]`
     * - `array  [update_date=array()]`
     * - `array  [update_time=array()]`
     * - `array  [update_dt=array()]`
     */
    function db_add_table_info($table, $database = "default") {
        $info_arr = array(
            "prefix" => "",
            "delete_flag" => "",
            "insert_date" => array(),
            "insert_time" => array(),
            "insert_dt" => array(),
            "update_date" => array(),
            "update_time" => array(),
            "update_dt" => array()
        );
        $return_arr = $info_arr;
        $db_info = $this->array_value($this->db_info, $database, true);
        if (count($db_info) == 0) {
            return $return_arr;
        }
        foreach ($return_arr as $k => $v) {
            if (!isset($db_info[$k])) {
                continue;
            } else if ($k == "prefix") {
                $return_arr[$k] = trim($db_info[$k]);
                continue;
            } else if ($k == "delete_flag") {
                $return_arr[$k] = trim(strtolower($db_info[$k]));
                continue;
            }
            foreach ($db_info[$k] as $temp) {
                $return_arr[$k][] = trim(strtolower($temp));
            }
        }
        //테이블설정 확인
        if (!isset($db_info["table"], $db_info["table"][$table])) {
            return $return_arr;
        }
        $return_arr = $info_arr;
        $table_info = $db_info["table"][$table];
        foreach ($return_arr as $k => $v) {
            if (!isset($table_info[$k])) {
                continue;
            } else if ($k == "prefix") {
                $return_arr[$k] = trim($table_info[$k]);
                continue;
            } else if ($k == "delete_flag") {
                $return_arr[$k] = trim(strtolower($table_info[$k]));
                continue;
            }
            foreach ($table_info[$k] as $temp) {
                $return_arr[$k][] = trim(strtolower($temp));
            }
        }
        return $return_arr;
    }

    /**
     * - 쿼리 변경된 레코드 갯수
     * 
     * require  2025.01.17
     * @version 2025.01.17
     *
     * @return int
     */
    function db_affected_rows() {
        return $this->db_affected_rows;
    }

    /**
     * - charset에 맞는 정보 반환
     * 
     * require  2026.01.02
     * @version 2026.01.02
     *
     * @param  string $charset 캐릭터셋
     * @return array           charset 정보
     * - `string [engine]`
     * - `string [charset]`
     * - `string [collate]`
     */
    function db_charset_info($charset) {
        $return_arr = array(
            "engine" => "",
            "charset" => "",
            "collate" => ""
        );
        if ($charset == "utf8mb4") {
            $return_arr["engine"] = "InnoDB";
            $return_arr["charset"] = "utf8mb4";
            $return_arr["collate"] = "utf8mb4_unicode_ci";
        } else if ($charset == "utf8") {
            $return_arr["engine"] = "MyISAM";
            $return_arr["charset"] = "utf8";
            $return_arr["collate"] = "utf8_general_ci";
        } else if ($charset == "euckr") {
            $return_arr["engine"] = "MyISAM";
            $return_arr["charset"] = "euckr";
            $return_arr["collate"] = "euckr_korean_ci";
        }
        return $return_arr;
    }

    /**
     * - mysqli connect
     * 
     * require  2026.01.02 array_value db_charset_info decode_base64
     * @version 2026.01.02
     *
     * @param  string $database 데이터베이스
     * @return array            접속정보배열
     * - `int    [code]` 1:성공, 2:실패
     * - `string [msg]`  설명
     * - `mysqli [link]` mysqil 객체(실패시 false)
     */
    function db_connect($database = "default") {
        $return_arr = array(
            "code" => "2",
            "msg" => "성공",
            "link" => false
        );
        //db설정값 존재여부
        $db_info = $this->array_value($this->db_info, $database, true);
        if (count($db_info) == 0) {
            $return_arr["msg"] = "Unknown database '{$database}'";
            return $return_arr;
        }
        //캐릭터셋확인
        $info = $this->db_charset_info($db_info["charset"]);
        if ($info["charset"] == "") {
            $return_arr["msg"] = "Unknown character set '{$db_info["charset"]}'";
            return $return_arr;
        }
        //base64 디코딩
        if ($db_info["base64_password_bool"]) {
            $db_info["password"] = $this->decode_base64($db_info["password"]);
        }
        //db접속(접속 실패시 에러메시지)
        $return_arr["link"] = mysqli_connect($db_info["host"], $db_info["username"], $db_info["password"], $db_info["database"], $db_info["port"]);
        //db접속확인
        if ($return_arr["link"] === false) {
            $return_arr["msg"] = "'{$database}' database connect failed";
            return $return_arr;
        }
        //캐릭터셋, 타임존, 메모리제한 설정
        mysqli_query($return_arr["link"], "set names '{$info["charset"]}' collate '{$info["collate"]}'");
        mysqli_query($return_arr["link"], "set time_zone = '{$db_info["time_zone"]}'");
        $return_arr["code"] = "1";
        return $return_arr;
    }

    /**
     * - set, into, values 컬럼 생성
     * - row 배열 키가 ` is` 로 끝나는경우 값 escape 처리 안함
     * - 필드명에 백틱(`) 입력하지 않아도 자동입력됨, row 배열 설명에는 백틱 생략되어있음
     * - 예제: `array("foo" => "bar()", "hello is" => "world()")` 인경우
     * + set: `foo = ?, hello = world()`
     * + into: `foo, hello`
     * + values: `?, world()`
     * + binding: `array("hello()")`
     * 
     * require  2026.02.05
     * @version 2026.02.05
     * 
     * @param  array $row_arr row 배열 (키가 컬럼명, 값이 컬럼값)
     * @param  int   $depth   들여쓰기 깊이(1당 4칸 들여쓰기)
     * @return array          row 정보
     * - `string [set]`     추가 set문
     * - `string [into]`    추가 into문
     * - `string [values]`  추가 values문
     * - `array  [binding]` 추가 binding문
     */
    function db_create_row($row_arr = array(), $depth = 1) {
        $return_arr = array(
            "set" => "",
            "into" => "",
            "values" => "",
            "binding" => array()
        );
        $padding = str_repeat(" ", $depth * 4);
        //row 정보 설정
        $arr = array(
            "set" => array(),
            "info" => array(),
            "values" => array()
        );
        foreach ($row_arr as $k => $v) {
            $k = trim(preg_replace("/\s+/", " ", str_replace("`", "", $k)));
            $temp = explode(" ", $k);
            $field = "`{$temp[0]}`";
            $operator = strtolower(substr($k, strlen($temp[0]) + 1));
            $arr["set"][] = $operator == "is" ? "{$field} = {$v}" : "{$field} = ?";
            $arr["into"][] = $field;
            $arr["values"][] = $operator == "is" ? $v : "?";
            if ($operator != "is") {
                $return_arr["binding"][] = $v;
            }
        }
        $list = array("set", "into", "values");
        foreach ($list as $temp) {
            $return_arr[$temp] .= implode(",\n{$padding}", $arr[$temp]);
        }
        return $return_arr;
    }

    /**
     * - 입력받은 where 배열에 맞는 sql where 쿼리문 생성
     * - 테이블명, 필드명, 연산자는 소문자로 강제 변경
     * - 필드명에 백틱(`) 입력하지 않아도 자동입력됨, where 배열 설명에는 백틱 생략되어있음
     * - 같지 않음을 표현하는 연산자는 `!=` 을 사용하지 말고 `<>` 을 사용
     * - where 배열 설명
     * - 기본적으로 배열 키는 컬럼명, 값은 컬럼값으로 구성된다
     * + `array("tb_name.foo" => "bar")` -> where: `tb_name.foo = ?`, binding: `array("bar")`
     * - 배열 키가 여러개인 경우 `$or_bool` 값에 따라 조건문이 이어진다
     * + `array("tb_name.foo" => "bar", "hello" => "world")`
     * + `$or_bool=true` -> where: `tb_name.foo = ? or hello = ?`, binding: `array("bar", "world")`
     * + `$or_bool=false` -> where: `tb_name.foo = ? and hello = ?`, binding: `array("bar", "world")`
     * - 연산자는 컬럼명 다음에 공백 한칸 추가 후 작성 가능하며 생략시 `=` 으로 처리된다
     * + `array("foo >" => "10")` -> where: `foo > ?`, binding: `array("10")`
     * - 연산자가 between 인경우 값에오는 배열값이 순서대로 입력된다
     * + `array("foo between" => array("1", "10"))` -> where: `foo between ? and ?`, binding: `array("1", "10")`
     * - 연산자가 in 이면서 값이 배열인경우 배열값이 순서대로 입력된다
     * + `array("foo in" => array("1", "10"))` -> where: `foo in(?, ?)`, binding: `array("1", "10")`
     * - 연산자가 in 이면서 값이 문자열인경우 값이 in 쿼리에 그대로 들어간다
     * + `array("foo in" => "select idx from tb")` -> where: `foo in(select idx from tb)`, binding: `array()`
     * - 연산자가 is 이면서 값이 null 또는 not null인경우 아래와 같이 생성된다
     * + `array("foo is" => "null", "hello is" => "not null")` -> where: `foo is null and hello is not null`, binding: `array()`
     * - 연산자가 is 이면서 값이 null 또는 not null이 아닌경우 값이 escape 처리되지 않고 그대로 입력된다
     * - 사용할 연산자는 is 다음에 공백 한칸 추가 후 작성 가능하며 생략시 `=` 으로 처리된다
     * + `array("foo is" => "now()", "hello is <" => "abs('10')")` => where: `foo = now() and hello < abs('10')`, binding: `array()`
     * - 배열 키가 중복되는 조건문은 아래와 같이 설정할 수 있다
     * + `array(array("foo >" => "1"), array("foo <" => "10"))` -> where: `foo > ? and foo < ?`, binding: `array("1", "10")`
     * - 서브쿼리가 존재하는 경우 다음과같이 처리된다
     * + `array(array("id" => "foo@bar.com", "email" => "foo@bar.com"), "pw" => "1234")`
     * + `$or_bool=true` -> where: `(id = ? and email = ?) or pw = ?`, binding: `array("foo@bar.com", "foo@bar.com", "1234")`
     * + `$or_bool=false` -> where: `(id = ? or email = ?) and pw = ?`, binding: `array("foo@bar.com", "foo@bar.com", "1234")`
     * - dot_bool 은 모든 키에 점이 포함된 경우에만 true로 반환되고 테이블명 또는 alias를 모두 입력하였는지 검증용으로 사용된다
     * + `array("tb.foo" => "bar", "mb.hello" => "world")` -> true
     * + `array("tb.foo" => "bar", "hello" => "world")` -> false
     * 
     * require  2026.02.06 db_create_where
     * @version 2026.02.06
     * 
     * @param  array $where_arr where 배열
     * @param  bool  $or_bool   true: or(서브쿼리 and), false: and(서브쿼리 or)
     * @param  int   $depth     들여쓰기 깊이
     * @return array            where 정보
     * - `string [where=""]`        where 쿼리
     * - `array  [binding=array()]` binding 배열
     * - `bool   [dot_bool=true]`   true 인경우 모든 키에 점 포함
     */
    function db_create_where($where_arr = array(), $or_bool = false, $depth = 1) {
        $return_arr = array(
            "where" => "",
            "binding" => array(),
            "dot_bool" => true
        );
        $padding = str_repeat(" ", $depth * 4);
        foreach ($where_arr as $k => $v) {
            if ($return_arr["where"] != "") {
                $return_arr["where"] .= $or_bool ? " or" : " and";
                $return_arr["where"] .= "\n{$padding}";
            }
            //키가 숫자인경우
            if ($k == strval(intval($k))) {
                $return_arr["where"] .= count($v) > 1 ? "(\n{$padding}    " : "";
                $temp = $this->db_create_where($v, !$or_bool, $depth + 1);
                $return_arr["where"] .= $temp["where"];
                $return_arr["binding"] = array_merge($return_arr["binding"], $temp["binding"]);
                $return_arr["dot_bool"] = $temp["dot_bool"] == false ? false : $return_arr["dot_bool"];
                $return_arr["where"] .= count($v) > 1 ? "\n{$padding})" : "";
                continue;
            }
            $k = trim(preg_replace("/\s+/", " ", str_replace("`", "", strtolower($k))));
            $key_arr = explode(" ", $k);
            $key = explode(".", $key_arr[0]);
            if (!isset($key[1])) {
                $return_arr["dot_bool"] = false;
            }
            $field = isset($key[1]) ? "`{$key[0]}`.`{$key[1]}`" : "`{$key[0]}`";
            $operator = substr($k, strlen($key_arr[0]) + 1);
            //between 쿼리
            if (in_array($operator, array("between", "is between"))) {
                if ($operator == "between") {
                    $return_arr["where"] .= "{$field} between ? and ?";
                    $return_arr["binding"][] = $v[0];
                    $return_arr["binding"][] = $v[1];
                } else {
                    $return_arr["where"] .= "{$field} between {$v[0]} and {$v[1]}";
                }
            }
            //in 쿼리(배열)
            else if (is_array($v)) {
                if (!in_array($operator, array("in", "not in"))) {
                    $operator = "in";
                }
                $return_arr["where"] .= "{$field} {$operator} (\n{$padding}    null";
                foreach ($v as $temp) {
                    $return_arr["where"] .= ", ?";
                    $return_arr["binding"][] = $temp;
                }
                $return_arr["where"] .= "\n{$padding})";
            }
            //in 쿼리(문자열)
            else if (in_array($operator, array("in", "not in"))) {
                $return_arr["where"] .= "{$field} {$operator} (\n{$v}\n{$padding})";
            }
            //is 쿼리
            else if (substr($operator, 0, 2) == "is") {
                //null 또는 not null인경우
                if (in_array(trim(strtolower($v)), array("null", "not null"))) {
                    $v = trim(strtolower($v));
                }
                //연산자 없는경우
                else if (strlen($operator) == 2) {
                    $operator = "=";
                }
                //연산자 있는경우
                else {
                    $operator = substr($operator, 3);
                }
                $return_arr["where"] .= "{$field} {$operator} {$v}";
            }
            //일반쿼리
            else {
                if ($operator == "") {
                    $operator = "=";
                }
                $return_arr["where"] .= "{$field} {$operator} ?";
                $return_arr["binding"][] = $v;
            }
        }
        return $return_arr;
    }

    /**
     * - 테이블 삭제(1개)
     * - delete_flag 변경시 update_dt도 갱신
     * - where 설정 안한경우 아무것도 삭제 안됨
     * 
     * require  2026.01.29 db_add_row db_add_table_info db_create_row db_create_where db_query
     * @version 2026.01.29
     * 
     * @param  string $table    테이블명
     * @param  array  $option   옵션
     * - `array  [where=array()]`    삭제 조건문, 키는 컬럼명, 값은 컬럼값
     * - `bool   [or_bool=false]`    true: where or문, false: where and문
     * - `bool   [force_bool=false]` true: 삭제, false(기본값): delete_flag 변경, delete_flag 없는경우 force_bool true로 변경
     * - `string [prefix=null]`      테이블 접두어, 세팅 안한경우 설정값
     * - `string [delete_flag=null]` 삭제여부컬럼, 세팅 안한경우 설정값
     * - `array  [update_date=null]` 수정일, 세팅 안한경우 설정값
     * - `array  [update_time=null]` 수정시, 세팅 안한경우 설정값
     * - `array  [update_dt=null]`   수정일시, 세팅 안한경우 설정값
     * @param  string $database 사용할 db명
     * @return int              affected_rows(수정 안된경우 0)
     */
    function db_delete($table, $option = array(), $database = "default") {
        $main_where = isset($option["where"]) ? $option["where"] : array();
        $or_bool = isset($option["or_bool"]) ? $option["or_bool"] : false;
        $force_bool = isset($option["force_bool"]) ? $option["force_bool"] : false;
        $result = $this->db_add_table_info($table, $database);
        $prefix = isset($option["prefix"]) ? $option["prefix"] : $result["prefix"];
        $delete_flag = isset($option["delete_flag"]) ? $option["delete_flag"] : $result["delete_flag"];
        $update_date = isset($option["update_date"]) ? $option["update_date"] : $result["update_date"];
        $update_time = isset($option["update_time"]) ? $option["update_time"] : $result["update_time"];
        $update_dt = isset($option["update_dt"]) ? $option["update_dt"] : $result["update_dt"];
        if ($delete_flag == "") {
            $force_bool = true;
        }
        $where_info = $this->db_create_where($main_where, $or_bool);
        if ($where_info["where"] == "") {
            $where_info["where"] = "1 = 0";
        }
        $sq = "";
        if ($force_bool) {
            $sq .= "delete from\n";
            $sq .= "    `{$prefix}{$table}`\n";
            $sq .= "where\n";
            $sq .= "    {$where_info["where"]}";
            $binding = $where_info["binding"];
        } else {
            $main_row = array($delete_flag => "y");
            $option = array(
                "date" => $update_date,
                "time" => $update_time,
                "datetime" => $update_dt
            );
            $row_arr = $this->db_add_row($main_row, $option);
            $row_info = $this->db_create_row($row_arr);
            $sq .= "update\n";
            $sq .= "    `{$prefix}{$table}`\n";
            $sq .= "set\n";
            $sq .= "    {$row_info["set"]}\n";
            $sq .= "where\n";
            $sq .= "    `{$delete_flag}` = 'n' and\n";
            $sq .= "    {$where_info["where"]}";
            $binding = array_merge($row_info["binding"], $where_info["binding"]);
        }
        $sql = $sq;
        $this->db_query($sql, $binding, $database);
        return $this->db_affected_rows;
    }

    /**
     * - 쿼리 문자열 이스케이프
     * - db 연결 이슈로 배열로 한번에 받아서 처리
     * 
     * require  2025.01.17 db_connect
     * @version 2025.01.17
     *
     * @param  array  $data     이스케이프할 데이터(키는 유지된 상태에서 값만 바뀜)
     * @param  string $database 사용할 db
     * @return array            이스케이프된 데이터 배열(에러인경우 빈배열)
     */
    function db_escape($data, $database = "default") {
        $content = $this->db_connect($database);
        if ($content["code"] == "2") {
            trigger_error($content["msg"]);
            exit;
        }
        $link = $content["link"];
        $return_arr = array();
        foreach ($data as $k => $v) {
            $result = mysqli_escape_string($link, $v);
            $return_arr[$k] = $result;
        }
        //db접속종료
        mysqli_close($link);
        return $return_arr;
    }

    /**
     * - from 절 테이블명 추출
     * - 테이블 별칭을 우선적으로 추출
     * 
     * require  2025.11.10
     * @version 2025.11.10
     * 
     * @param  string $sql 쿼리문
     * @return string      테이블명 또는 테이블별칭, 에러인경우 빈문자열
     */
    function db_from_table_name($sql) {
        //테이블별명 또는 테이블명 추출
        preg_match_all("/\s+from\s+(`?[^`\s]+`?)(?:\s+as)?(?:\s|$)+(`?[^`\s]*`?)/i", $sql, $matches);
        //테이블명 없는경우
        if (!isset($matches[1][0])) {
            return "";
        }
        //별칭 있으면서 별칭이 키워드가 아닌경우
        if ($matches[2][0] != "") {
            $lower_name = strtolower($matches[2][0]);
            $keyword = array(
                "inner",
                "outer",
                "left",
                "right",
                "join",
                "cross",
                "natural",
                "where",
                "group",
                "having",
                "order",
                "limit",
                "union",
                "intersect",
                "minus"
            );
            if (!in_array($lower_name, $keyword)) {
                return str_replace("`", "", $matches[2][0]);
            }
        }
        //별칭 없는경우
        return str_replace("`", "", $matches[1][0]);
    }

    /**
     * - 테이블 인서트(1개)
     * 
     * require  2026.02.05 db_add_row db_add_table_info db_create_row db_create_where db_query 
     * @version 2026.02.05
     * 
     * @param  string $table    테이블명
     * @param  array  $option   옵션
     * - `array  [row=array()]`      입력할 값, 키는 컬럼명, 값은 컬럼값
     * - `array  [where=array()]`    중복 조건문, 키는 컬럼명, 값은 컬럼값
     * - `bool   [or_bool=false]`    true: 중복체크 where or문, false: 중복체크 where and문
     * - `string [prefix=null]`      테이블 접두어, 세팅 안한경우 설정값
     * - `array  [insert_date=null]` 입력일, 세팅 안한경우 설정값
     * - `array  [insert_time=null]` 입력시, 세팅 안한경우 설정값
     * - `array  [insert_dt=null]`   입력일시, 세팅 안한경우 설정값
     * - `array  [update_date=null]` 수정일, 세팅 안한경우 설정값
     * - `array  [update_time=null]` 수정시, 세팅 안한경우 설정값
     * - `array  [update_dt=null]`   수정일시, 세팅 안한경우 설정값
     * @param  string $database 사용할 db명
     * @return int              insert_id(입력 안된경우 0)
     */
    function db_insert($table, $option = array(), $database = "default") {
        $main_row = isset($option["row"]) ? $option["row"] : array();
        $main_where = isset($option["where"]) ? $option["where"] : array();
        $or_bool = isset($option["or_bool"]) ? $option["or_bool"] : false;
        $result = $this->db_add_table_info($table, $database);
        $prefix = isset($option["prefix"]) ? $option["prefix"] : $result["prefix"];
        $insert_date = isset($option["insert_date"]) ? $option["insert_date"] : $result["insert_date"];
        $insert_time = isset($option["insert_time"]) ? $option["insert_time"] : $result["insert_time"];
        $insert_dt = isset($option["insert_dt"]) ? $option["insert_dt"] : $result["insert_dt"];
        $update_date = isset($option["update_date"]) ? $option["update_date"] : $result["update_date"];
        $update_time = isset($option["update_time"]) ? $option["update_time"] : $result["update_time"];
        $update_dt = isset($option["update_dt"]) ? $option["update_dt"] : $result["update_dt"];
        $option = array(
            "date" => array_merge($insert_date, $update_date),
            "time" => array_merge($insert_time, $update_time),
            "datetime" => array_merge($insert_dt, $update_dt)
        );
        $row_arr = $this->db_add_row($main_row, $option);
        $row_info = $this->db_create_row($row_arr);
        $sq = "";
        //중복체크인경우
        if (count($main_where) > 0) {
            $where_info = $this->db_create_where($main_where, $or_bool, 2);
            $sq .= "insert into `{$prefix}{$table}` (\n";
            $sq .= "    {$row_info["into"]}\n";
            $sq .= ")\n";
            $sq .= "select\n";
            $sq .= "    {$row_info["values"]}\n";
            $sq .= "from\n";
            $sq .= "    dual\n";
            $sq .= "where not exists (\n";
            $sq .= "    select\n";
            $sq .= "        1\n";
            $sq .= "    from\n";
            $sq .= "        `{$prefix}{$table}`\n";
            $sq .= "    where\n";
            $sq .= "        {$where_info["where"]}\n";
            $sq .= ")";
            $binding = array_merge($row_info["binding"], $where_info["binding"]);
        }
        //아닌경우
        else {
            $sq .= "insert into `{$prefix}{$table}` (\n";
            $sq .= "    {$row_info["into"]}\n";
            $sq .= ") values (\n";
            $sq .= "    {$row_info["values"]}\n";
            $sq .= ")";
            $binding = $row_info["binding"];
        }
        $sql = $sq;
        $this->db_query($sql, $binding, $database);
        return $this->db_affected_rows > 0 ? $this->db_insert_id : 0;
    }

    /**
     * - 마지막으로 인서트된 primary key
     * 
     * require  2025.11.18
     * @version 2025.11.18
     *
     * @return int
     */
    function db_insert_id() {
        return $this->db_insert_id;
    }

    /**
     * - 마지막 쿼리문
     * 
     * require  2025.01.17
     * @version 2025.01.17
     *
     * @return string
     */
    function db_last_query() {
        return $this->db_last_query;
    }

    /**
     * - 쿼리 보내기
     * - 쿼리 실패시 프로그램 종료
     * 
     * require  2025.11.25 db_connect db_escape
     * @version 2025.11.25
     *
     * @param  string $sql
     * @param  array  $binding  prepared statement 인경우 사용
     * @param  string $database 사용할 db
     * @return array            쿼리결과리스트, 리스트가 없는경우 키가 필드명, 값이 null인 배열
     */
    function db_query($sql, $binding = array(), $database = "default") {
        $content = $this->db_connect($database);
        if ($content["code"] == "2") {
            trigger_error($content["msg"]);
            exit;
        }
        $link = $content["link"];
        //문자열 치환
        preg_match_all("/(?<!\\\\)'([\S\s]*?)(?:[^\\\\]*\\\\\\\\)*(?<!\\\\)'/", $sql, $text_arr);
        foreach ($text_arr[0] as $k => $v) {
            //한개씩 변환하기 위에 preg_replace 사용
            $sql = preg_replace('/' . preg_quote($v, "/") . '/', '\\$' . $k . '\\$', $sql, 1);
        }
        //바인딩 갯수
        $binding_cnt = count($binding);
        //마지막 실행 쿼리문에 바인딩 추가
        if ($binding_cnt > 0 && substr_count($sql, "?") == count($binding)) {
            $error_sql = str_replace(array("%", "?"), array("%%", "'%s'"), $sql);
            $error_binding = $this->db_escape($binding, $database);
            $error_sql = call_user_func_array("sprintf", array_merge(array($error_sql), $error_binding));
        } else {
            $error_sql = $sql;
        }
        //문자열복구(역순)
        $reverse_arr = array_reverse($text_arr[0]);
        $cnt = count($reverse_arr) - 1;
        foreach ($reverse_arr as $k => $v) {
            //한개씩 변환하기 위에 preg_replace 사용
            $sql = preg_replace('/' . preg_quote('$' . ($cnt - $k) . '$', "/") . '/', $v, $sql, 1);
            $error_sql = preg_replace('/' . preg_quote('$' . ($cnt - $k) . '$', "/") . '/', $v, $error_sql, 1);
        }
        //마지막 쿼리문 저장
        $this->db_last_query = $error_sql;
        //반환값
        $result = array();
        //바인딩 없는경우
        if ($binding_cnt == 0) {
            $query = mysqli_query($link, $sql);
            //쿼리에러인경우 종료
            if ($query === false) {
                $db_error = mysqli_error($link);
                mysqli_close($link);
                trigger_error("{$db_error}\n{$this->db_last_query}\n");
                exit;
            }
            //빈쿼리인경우 빈값 반환
            else if ($query === true) {
                mysqli_close($link);
                return $result;
            }
            //insert_id, affected_rows 저장
            $this->db_insert_id = mysqli_insert_id($link);
            $this->db_affected_rows = mysqli_affected_rows($link);
            while ($row = mysqli_fetch_assoc($query)) {
                $result[] = $row;
            }
            if (count($result) == 0) {
                $field = mysqli_fetch_fields($query);
                foreach ($field as $temp) {
                    $result[$temp->name] = null;
                }
            }
            mysqli_close($link);
            return $result;
        }
        //바인딩 있는경우
        do {
            $db_error = "";
            $stmt = mysqli_prepare($link, $sql);
            //쿼리에러인경우 종료
            if ($stmt === false) {
                break;
            }
            //기본 파라미터
            $param_arr = array(
                $stmt,
                str_repeat("s", $binding_cnt)
            );
            foreach ($binding as $k => $v) {
                $param_arr[] = &$binding[$k];
            }
            //바인딩함수 실행
            $stmt_bool = call_user_func_array("mysqli_stmt_bind_param", $param_arr) ? true : false;
            //바인딩 실패한경우 종료
            if (!$stmt_bool) {
                $db_error = mysqli_stmt_error($stmt);
                mysqli_stmt_close($stmt);
                break;
            }
            //쿼리실행
            $stmt_bool = mysqli_stmt_execute($stmt);
            //실행 실패한경우 종료
            if (!$stmt_bool) {
                $db_error = mysqli_stmt_error($stmt);
                mysqli_stmt_close($stmt);
                break;
            }
            //insert_id, affected_rows 저장
            $this->db_insert_id = mysqli_stmt_insert_id($stmt);
            $this->db_affected_rows = mysqli_stmt_affected_rows($stmt);
            //필드정보 쿼리 실행
            $query = mysqli_stmt_result_metadata($stmt);
            if ($query === false) {
                mysqli_stmt_close($stmt);
                mysqli_close($link);
                return $result;
            }
            //필드배열
            $row = array();
            //bind_result 파라미터
            $binding_arr = array(
                $stmt
            );
            //필드배열 및 bind_result 파라미터 생성
            while ($field = mysqli_fetch_field($query)) {
                $row[$field->name] = null;
                $binding_arr[] = &$row[$field->name];
                $field_arr[] = $field->name;
            }
            //필드값 바인딩
            call_user_func_array("mysqli_stmt_bind_result", $binding_arr);
            //result 생성(참조값으로 인해 일일히 값 넣어줌)
            for ($i = 0; mysqli_stmt_fetch($stmt); $i++) {
                foreach ($row as $k => $v) {
                    $result[$i][$k] = $v;
                }
            }
            if (count($result) == 0) {
                foreach ($row as $k => $v) {
                    $result[$k] = null;
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($link);
            return $result;
        } while (false);
        if ($db_error == "") {
            $db_error = mysqli_error($link);
        }
        mysqli_close($link);
        trigger_error("{$db_error}\n{$this->db_last_query}\n");
        exit;
    }

    /**
     * - 쿼리결과 여러줄
     * 
     * require  2025.03.06 db_query
     * @version 2025.03.06
     *
     * @param  string $sql
     * @param  array  $binding  prepared statement 인경우 사용
     * @param  string $database 사용할 db
     * @return array
     */
    function db_result_array($sql, $binding = array(), $database = "default") {
        $result = $this->db_query($sql, $binding, $database);
        return isset($result[0]) ? $result : array();
    }

    /**
     * - 쿼리결과 1줄
     * 
     * require  2025.03.06 db_query
     * @version 2025.03.06
     *
     * @param  string $sql
     * @param  array  $binding  prepared statement 인경우 사용
     * @param  string $database 사용할 db
     * @return array
     */
    function db_row_array($sql, $binding = array(), $database = "default") {
        $result = $this->db_query($sql, $binding, $database);
        return isset($result[0]) ? $result[0] : $result;
    }

    /**
     * - select 부분을 `count(*) as cnt` 로 변경한 쿼리 결과
     * - db/list 폴더 내 {$database}/{$table}.sql 파일 가져와서 사용
     * - sql 파일 없는경우 `select count(*) as cnt from {테이블명}` 쿼리 사용
     * - delete_flag_bool 값은 delete_flag 컬럼 설정 안한경우 false 로 강제변경
     * 
     * require  2026.01.29 db_row_array db_select_sql
     * @version 2026.01.29
     * 
     * @param  string $table    테이블명
     * @param  array  $option   옵션  
     * - `array  [where=array()]`         where문, 키는 컬럼명, 값은 컬럼값
     * - `bool   [or_bool=false]`         true: where or문, false: where and문
     * - `bool   [delete_flag_bool=true]` true - 삭제여부 사용, false - 삭제여부 사용안함, 삭제여부는 y, n 값으로 판단
     * - `bool   [where_table_bool=true]` true 인경우 where 문에 축약테이블명 필수, ex) array("`st`.`field`" => "value")
     * - `string [prefix=null]`           테이블 접두어, 세팅 안한경우 설정값
     * - `string [delete_flag=null]`      삭제여부 컬럼, 세팅 안한경우 설정값
     * @param  string $database 사용 데이터베이스
     * @return array            쿼리결과 배열, 배열 키가 컬럼명이고 값이 컬럼값인 1차원 배열
     */
    function db_select_cnt($table, $option = array(), $database = "default") {
        $option["select"] = array("count(*) as `cnt`");
        $option["group_by"] = array();
        $option["order_by"] = array("`cnt`");
        unset($option["limit"]);
        //sql 추출
        $sql_info = $this->db_select_sql($table, $option, $database);
        $sql = $sql_info["sql"];
        $binding = $sql_info["binding"];
        //쿼리 실행
        $result = $this->db_row_array($sql, $binding, $database);
        return $result;
    }

    /**
     * - list 쿼리 결과
     * - db/list 폴더 내 {$database}/{$table}.sql 파일 가져와서 사용
     * - sql 파일 없는경우 `select * from {테이블명}` 쿼리 사용
     * - delete_flag_bool 값은 delete_flag 컬럼 설정 안한경우 false 로 강제변경
     * - 정렬배열은 빈배열인경우 쿼리문에 있는 기본 정렬 사용
     * 
     * require  2026.02.06 db_result_array db_row_array db_select_sql
     * @version 2026.02.06
     * 
     * @param  string $table    테이블명
     * @param  array  $option   옵션
     * - `array  [select=array()]`        select 컬럼 리스트(기본컬럼인경우 빈배열)
     * - `array  [where=array()]`         where문, 키는 컬럼명, 값은 컬럼값
     * - `bool   [or_bool=false]`         true: where or문, false: where and문
     * - `bool   [delete_flag_bool=true]` true - 삭제여부 사용, false - 삭제여부 사용안함, 삭제여부는 y, n 값으로 판단
     * - `bool   [where_table_bool=true]` true 인경우 where 문에 축약테이블명 필수, ex) array("`st`.`field`" => "value")
     * - `array  [group_by=array()]`      group by 컬럼 1차원배열, 빈배열인경우 설정안함
     * - `array  [having=array()]`        having, 빈배열이거나 group by 설정 안되어있는경우 설정안함
     * - `bool   [having_or_bool=false]`  true: having or문, false: having and문
     * - `array  [order_by=array()]`      정렬 배열, "컬럼명 정렬방향" 문자열을 값으로 가지는 1차원 배열 (예: array("`a`.`idx` desc"))
     * - `int    [limit]`                 표시갯수
     * - `int    [start]`                 표시 시작점, limit 있는경우에만
     * - `string [prefix=null]`           테이블 접두어, 세팅 안한경우 설정값
     * - `string [delete_flag=null]`      삭제여부 컬럼, 세팅 안한경우 설정값
     * - `bool   [info_bool=false]`       true: 하나의 row 배열 반환, false: 다중 row 배열 반환
     * @param  string $database 사용 데이터베이스
     * @return array            쿼리결과 배열
     * - info_bool 값이 true 인경우 배열 키가 컬럼명이고 값이 컬럼값인 1차원 배열 반환
     * - info_bool 값이 false 인경우 1차원 배열 리스트(2차원 배열)를 반환
     */
    function db_select_list($table, $option = array(), $database = "default") {
        $info_bool = isset($option["info_bool"]) ? $option["info_bool"] : false;
        //sql 추출
        $sql_info = $this->db_select_sql($table, $option, $database);
        $sql = $sql_info["sql"];
        $binding = $sql_info["binding"];
        //쿼리 실행
        $result = $info_bool ? $this->db_row_array($sql, $binding, $database) : $this->db_result_array($sql, $binding, $database);
        return $result;
    }

    /**
     * - 테이블별 select SQL 쿼리문 정보 반환
     * - db/list 폴더 내 {$database}/{$table}.sql 파일 가져와서 사용
     * - sql 파일 없는경우 `select * from {테이블명}` 쿼리 사용
     * - delete_flag_bool 값은 delete_flag 컬럼 설정 안한경우 false 로 강제변경
     * - 정렬배열은 빈배열인경우 쿼리문에 있는 기본 정렬 사용
     * 
     * require  2026.02.06 db_add_prefix db_add_table_info db_create_where db_from_table_name
     * @version 2026.02.06
     * 
     * @param  string $table    테이블명
     * @param  array  $option   옵션
     * - `array  [select=array()]`        select 컬럼 리스트(기본컬럼인경우 빈배열)
     * - `array  [where=array()]`         where문, 키는 컬럼명, 값은 컬럼값
     * - `bool   [or_bool=false]`         true: where or문, false: where and문
     * - `bool   [delete_flag_bool=true]` true - 삭제여부 사용, false - 삭제여부 사용안함, 삭제여부는 y, n 값으로 판단
     * - `bool   [where_table_bool=true]` true 인경우 where 문에 축약테이블명 필수, ex) array("`st`.`field`" => "value")
     * - `array  [group_by=array()]`      group by 컬럼 1차원배열, 빈배열인경우 설정안함
     * - `array  [having=array()]`        having, 빈배열이거나 group by 설정 안되어있는경우 설정안함
     * - `bool   [having_or_bool=false]`  true: having or문, false: having and문
     * - `array  [order_by=array()]`      정렬 배열, "컬럼명 정렬방향" 문자열을 값으로 가지는 1차원 배열 (예: array("`a`.`idx` desc"))
     * - `int    [limit]`                 표시갯수
     * - `int    [start]`                 표시 시작점, limit 있는경우에만
     * - `string [prefix=null]`           테이블 접두어, 세팅 안한경우 설정값
     * - `string [delete_flag=null]`      삭제여부 컬럼, 세팅 안한경우 설정값
     * @param  string $database 사용 데이터베이스
     * @return array            select SQL 쿼리문 정보
     * - `string [sql=""]`          sql문
     * - `array  [binding=array()]` binding 배열
     */
    function db_select_sql($table, $option = array(), $database = "default") {
        $select_arr = isset($option["select"]) ? $option["select"] : array();
        $where_arr = isset($option["where"]) ? $option["where"] : array();
        $or_bool = isset($option["or_bool"]) ? $option["or_bool"] : false;
        $delete_flag_bool = isset($option["delete_flag_bool"]) ? $option["delete_flag_bool"] : true;
        $where_table_bool = isset($option["where_table_bool"]) ? $option["where_table_bool"] : true;
        $group_by_arr = isset($option["group_by"]) ? $option["group_by"] : array();
        $having_arr = isset($option["having"]) ? $option["having"] : array();
        $having_or_bool = isset($option["having_or_bool"]) ? $option["having_or_bool"] : false;
        $order_by_arr = isset($option["order_by"]) ? $option["order_by"] : array();
        //테이블정보
        $table_info = $this->db_add_table_info($table, $database);
        $prefix = isset($option["prefix"]) ? $option["prefix"] : $table_info["prefix"];
        $delete_flag = isset($option["delete_flag"]) ? $option["delete_flag"] : $table_info["delete_flag"];
        if ($delete_flag == "") {
            $delete_flag_bool = false;
        }
        //파일 가져오기
        $file = dirname(__FILE__) . "/db/list/{$database}/{$table}.sql";
        if (file_exists($file)) {
            $sql = $this->db_add_prefix(file_get_contents($file), $prefix);
        } else {
            $sq = "";
            $sq .= "select\n";
            $sq .= "    *\n";
            $sq .= "from\n";
            $sq .= "    `{$prefix}{$table}`";
            $sql = $sq;
        }
        //order by 분리
        $arr = explode("order by", str_ireplace("order by", "order by", $sql));
        $sql = trim($arr[0]);
        $order_by = isset($arr[1]) ? trim($arr[1]) : "";
        $binding = array();
        //select
        if (count($select_arr) > 0) {
            $select = "select\n    " . implode(",\n    ", $select_arr) . "\nfrom";
            $sql = preg_replace("/select\s([\S\s]*?)\sfrom/i", $select, $sql);
        }
        //where
        $where_info = $this->db_create_where($where_arr, $or_bool, $delete_flag_bool ? 2 : 1);
        if ($where_table_bool && !$where_info["dot_bool"]) {
            trigger_error("where 문에 반드시 테이블명 또는 테이블 축약명을 적어주세요");
            exit;
        }
        if ($delete_flag_bool) {
            $short = $this->db_from_table_name($sql);
            if ($short != "") {
                $short = "`{$short}`.";
            }
            if ($where_info["where"] == "") {
                $where_info["where"] = "{$short}`{$delete_flag}` = 'n'";
            } else {
                $sq = "";
                $sq .= "{$short}`{$delete_flag}` = 'n' and\n";
                $sq .= "    (\n";
                $sq .= "        {$where_info["where"]}\n";
                $sq .= "    )";
                $where_info["where"] = $sq;
            }
        }
        if ($where_info["where"] != "") {
            $sql .= "\nwhere\n    " . $where_info["where"];
            $binding = array_merge($binding, $where_info["binding"]);
        }
        //group by
        if (count($group_by_arr) > 0) {
            $sql .= "\ngroup by\n    " . implode("\n    ", $group_by_arr);
        }
        //having
        if (count($group_by_arr) > 0 && count($having_arr) > 0) {
            $having_info = $this->db_create_where($having_arr, $having_or_bool);
            $sql .= "\nhaving\n    " . $having_info["where"];
            $binding = array_merge($binding, $having_info["binding"]);
        }
        //order by
        if (count($order_by_arr) > 0) {
            $order_by = implode(",\n    ", $order_by_arr);
        }
        if ($order_by != "") {
            $sql .= "\norder by\n    " . $order_by;
        }
        if (isset($option["limit"])) {
            $sql .= "\nlimit\n    " . (isset($option["start"]) ? "{$option["start"]}, " : "") . $option["limit"];
        }
        return array(
            "sql" => $sql,
            "binding" => $binding
        );
    }

    /**
     * - 데이터베이스 백업
     * - 순차적으로 증가하는 기본키가 있는 테이블만 백업 가능
     * - 삭제된 데이터는 백업테이블에 반영되지 않음
     * - update_dt 설정하지 않은 테이블은 수정내역 백업 안됨
     * - 복구시 기본키 겹치는 데이터는 업데이트 되지 않음
     * - 백업시 겹치는 테이블명 있는지 확인필요
     * - db/ddl 폴더 내 {$database}/{$table}.json 파일 등록해야 백업 가능
     * - config.php
     * - 백업이 저장될 곳 DB 접속정보만 설정
     * - 백업이 저장될 곳에 db, tb 테이블 이미 있는경우 접두어 설정
     * - 백업대상 DB 접속정보 설정, 테이블 정보는 prefix와 update_dt(인덱스 설정 필수) 정보만 설정
     * 
     * require  2026.01.02 array_value db_add_table_info db_charset_info db_create_where db_insert db_query db_row_array db_table_create_sql db_table_ddl db_update decode_json encode_json
     * @version 2026.01.02
     * 
     * @param array $target    백업대상 데이터베이스 배열
     * - `string [{데이터베이스명}][]` 테이블명
     * @param string $database 백업이 저장될 곳 데이터베이스
     */
    function db_table_backup($target, $database = "default") {
        //백업db prefix
        $arr = $this->db_add_table_info("db", $database);
        $db_prefix = $arr["prefix"];
        $arr = $this->db_add_table_info("tb", $database);
        $tb_prefix = $arr["prefix"];
        //백업db charset
        $backup_charset = "";
        if (isset($this->db_info[$database])) {
            $backup_charset = $this->array_value($this->db_info[$database], "charset");
        }
        $arr = $this->db_charset_info($backup_charset);
        //백업db 테이블 생성
        $sql = "
            create table if not exists `{$db_prefix}db` (
                `db_idx`    int(11)      not null auto_increment comment 'pk',
                `name`      varchar(191) null     default null   comment '데이터베이스명',
                `update_dt` datetime     null     default null   comment '수정일시',
                primary key (`db_idx`),
                index (`name`),
                index (`update_dt`)
            ) ENGINE={$arr['engine']} DEFAULT CHARSET={$arr['charset']} COLLATE={$arr['collate']} COMMENT='데이터베이스(d)'
        ";
        $this->db_query($sql, array(), $database);
        $sql = "
            create table if not exists `{$tb_prefix}tb` (
                `tb_idx`    int(11)      not null auto_increment comment 'pk',
                `db_idx`    int(11)      null     default null   comment '데이터베이스',
                `name`      varchar(191) null     default null   comment '테이블명',
                `fields`    text         null     default null   comment '필드리스트',
                `backup_pk` varchar(191) null     default null   comment '백업기본키',
                `backup_dt` datetime     null     default null   comment '백업일시',
                `update_dt` datetime     null     default null   comment '수정일시',
                primary key (`tb_idx`),
                index (`db_idx`),
                index (`name`),
                index (`update_dt`)
            ) ENGINE={$arr['engine']} DEFAULT CHARSET={$arr['charset']} COLLATE={$arr['collate']} COMMENT='테이블(t)';
        ";
        $this->db_query($sql, array(), $database);
        //백업db 쿼리문
        $db_sql = "
            select
                `db_idx`,
                `name`,
                `update_dt`
            from
                `{$db_prefix}db`
        ";
        $tb_sql = "
            select
                `tb_idx`,
                `db_idx`,
                `name`,
                `fields`,
                `backup_pk`,
                `backup_dt`,
                `update_dt`
            from
                `{$tb_prefix}tb`
        ";
        foreach ($target as $db => $tbs) {
            //db_idx 가져오기
            $option = array(
                "row" => array(
                    "name" => $db,
                    "update_dt is" => "now()"
                ),
                "where" => array(
                    "name" => $db
                )
            );
            $this->db_insert("db", $option, $database);
            $where_info = $this->db_create_where(array(
                "name" => $db
            ));
            $sql = $db_sql . " where " . $where_info["where"];
            $result = $this->db_row_array($sql, $where_info["binding"], $database);
            $db_idx = intval($result["db_idx"]);
            //현재날짜 가져오기(대상DB 기준)
            $sql = "select date_format(now(), '%Y%m%d%H%i%s') as `dt`";
            $result = $this->db_row_array($sql, array(), $db);
            $dt = $result["dt"];
            foreach ($tbs as $tb) {
                //테이블 ddl
                $result = $this->db_table_ddl($tb, $db);
                //ddl 없는경우 백업 안함
                if (count($result) == 0) {
                    trigger_error("백업하려는 database:{$db}, table:{$tb} DDL이 존재하지 않습니다.");
                    continue;
                }
                //ddl, 쿼리정보 생성
                $ddl = $select = array();
                $primary = "";
                foreach ($result["columns"] as $temp) {
                    $ddl[] = array($temp[0] => $temp[1]);
                    $select[] = "`{$temp[0]}`";
                    if ($temp[1] == "primary") {
                        if ($primary != "") {
                            $primary = "";
                            break;
                        }
                        $primary = $temp[0];
                    }
                }
                if ($primary == "") {
                    trigger_error("백업하려는 database:{$db}, table:{$tb} primary는 1개여야 합니다.");
                    continue;
                }
                //information for backup
                $result = $this->db_add_table_info($tb, $db);
                $prefix = $result["prefix"];
                $update_dt = $this->array_value($result["update_dt"], 0);
                //target 쿼리문 생성
                $target_sql = "select " . implode(", ", $select) . " from `{$prefix}{$tb}`";
                //백업 진행상황 가져오기
                $where_info = $this->db_create_where(array(
                    "db_idx" => $db_idx,
                    "name" => $tb
                ));
                $sql = $tb_sql . " where " . $where_info["where"];
                $result = $this->db_row_array($sql, $where_info["binding"], $database);
                //백업정보 없는경우
                if (intval($result["tb_idx"]) == 0) {
                    //백업정보 생성
                    $option = array(
                        "row" => array(
                            "db_idx" => $db_idx,
                            "name" => $tb,
                            "update_dt is" => "now()"
                        ),
                        "where" => array(
                            "db_idx" => $db_idx,
                            "name" => $tb
                        )
                    );
                    $this->db_insert("tb", $option, $database);
                    //백업 진행상황 가져오기
                    $result = $this->db_row_array($sql, $where_info["binding"], $database);
                }
                $tb_idx = intval($result["tb_idx"]);
                $fields = $this->decode_json($result["fields"]);
                $backup_pk = trim(strval($result["backup_pk"]));
                $backup_dt = trim(strval($result["backup_dt"]));
                if ($backup_dt != "") {
                    $backup_dt = date("YmdHis", strtotime($backup_dt));
                }
                //ddl 검증
                $fail_bool = false;
                do {
                    //ddl 길이 다른경우
                    if (count($ddl) != count($fields)) {
                        $fail_bool = true;
                        break;
                    }
                    foreach ($ddl as $k => $v) {
                        foreach ($v as $field_name => $field_type) {
                        }
                        //ddl 달라진경우
                        if ($field_type != $this->array_value($fields[$k], $field_name)) {
                            $fail_bool = true;
                            break;
                        }
                    }
                } while (false);
                //검증 실패한경우
                if ($fail_bool) {
                    //테이블 삭제처리
                    $sql = "drop table if exists `{$prefix}{$tb}`";
                    $this->db_query($sql, array(), $database);
                    //변수 초기화
                    $fields = $ddl;
                    $backup_pk = $backup_dt = "";
                }
                //테이블 생성쿼리 조회
                $result = $this->db_table_create_sql($tb, array("charset" => $backup_charset), $db);
                $this->db_query($result[0], array(), $database);
                //Update for backup
                if ($update_dt != "") {
                    for ($current_idx = null; true; $current_idx = $idx) {
                        //row 조회
                        $where = array(
                            "{$primary} <=" => $backup_pk
                        );
                        if ($backup_dt != "") {
                            $where["{$update_dt} >"] = $backup_dt;
                            $where["{$update_dt} <="] = $dt;
                        }
                        if ($current_idx !== null) {
                            $where["{$primary} >"] = $current_idx;
                        }
                        $where_info = $this->db_create_where($where);
                        $sql = "{$target_sql} where {$where_info["where"]} order by `{$primary}` limit 1";
                        $result = $this->db_row_array($sql, $where_info["binding"], $db);
                        $idx = $result[$primary];
                        //row가 없는경우
                        if (is_null($idx)) {
                            break;
                        }
                        //row 생성
                        $row = array();
                        foreach ($result as $k => $v) {
                            if (is_null($v)) {
                                $row["{$k} is"] = "null";
                            } else {
                                $row[$k] = $v;
                            }
                        }
                        $option = array(
                            "row" => $row,
                            "where" => array($primary => $idx),
                            "prefix" => $prefix
                        );
                        //update
                        $affected_rows = $this->db_update($tb, $option, $database);
                        if ($affected_rows > 0) {
                            continue;
                        }
                        //insert
                        $this->db_insert($tb, $option, $database);
                    }
                    $backup_dt = $dt;
                } else {
                    //수정일시 필드 없는경우 백업일시 삭제
                    $backup_dt = "";
                }
                //Insert for backup
                for ($current_idx = $backup_pk; true; $current_idx = $backup_pk = $idx) {
                    $sql = "{$target_sql} where `{$primary}` > '{$current_idx}' order by `{$primary}` limit 1";
                    $result = $this->db_row_array($sql, array(), $db);
                    $idx = $result[$primary];
                    //row가 없는경우
                    if (is_null($idx)) {
                        break;
                    }
                    //row 생성
                    $row = array();
                    foreach ($result as $k => $v) {
                        if (is_null($v)) {
                            $row["{$k} is"] = "null";
                        } else {
                            $row[$k] = $v;
                        }
                    }
                    $option = array(
                        "row" => $row,
                        "where" => array($primary => $idx),
                        "prefix" => $prefix
                    );
                    //insert
                    $this->db_insert($tb, $option, $database);
                }
                //백업정보 업데이트
                $row = array(
                    "fields" => $this->encode_json($fields),
                    "backup_pk" => $backup_pk,
                    "update_dt is" => "now()"
                );
                if ($backup_dt == "") {
                    $row["backup_dt is"] = "null";
                } else {
                    $row["backup_dt"] = $backup_dt;
                }
                $option = array(
                    "row" => $row,
                    "where" => array(
                        "tb_idx" => $tb_idx
                    )
                );
                $this->db_update("tb", $option, $database);
            }
        }
    }

    /**
     * - 테이블 생성 SQL 및 초기 INSERT SQL 반환
     * - db_table_ddl() 함수 반환값 이용하여 생성
     * - 접두어는 config.php 파일에 설정된 값으로 치환
     * - 실패시 빈배열 반환
     * 
     * require  2026.01.02 array_value db_add_table_info db_charset_info db_row_array db_table_ddl str_pad
     * @version 2026.01.02
     * 
     * @param  string $table    테이블명
     * @param  array  $option   옵션
     * - `string [charset=null]`     캐릭터셋(utf8mb4, utf8, euckr), 세팅 안한경우 설정값
     * - `string [prefix=null]`      테이블 접두어, 세팅 안한경우 설정값
     * - `string [delete_flag=null]` 삭제여부컬럼, 세팅 안한경우 설정값
     * - `array  [insert_date=null]` 입력일, 세팅 안한경우 설정값
     * - `array  [insert_time=null]` 입력시, 세팅 안한경우 설정값
     * - `array  [insert_dt=null]`   입력일시, 세팅 안한경우 설정값
     * - `array  [update_date=null]` 수정일, 세팅 안한경우 설정값
     * - `array  [update_time=null]` 수정시, 세팅 안한경우 설정값
     * - `array  [update_dt=null]`   수정일시, 세팅 안한경우 설정값
     * @param  string $database 사용할 db
     * @return array            0: 테이블 생성 SQL, 1이상: 초기 INSERT SQL
     */
    function db_table_create_sql($table, $option = array(), $database = "default") {
        $return_arr = array();
        //db, table 검사
        $table_info = $this->db_table_ddl($table, $database);
        if (count($table_info) == 0) {
            return $return_arr;
        }
        //charset 검사
        $charset = "";
        if (isset($option["charset"])) {
            $charset = $option["charset"];
        } else if (isset($this->db_info[$database])) {
            $charset = $this->array_value($this->db_info[$database], "charset");
        }
        $info = $this->db_charset_info($charset);
        if ($info["charset"] == "") {
            return $return_arr;
        }
        //옵션 설정
        $result = $this->db_add_table_info($table, $database);
        $prefix = isset($option["prefix"]) ? $option["prefix"] : $result["prefix"];
        $delete_flag = isset($option["delete_flag"]) ? $option["delete_flag"] : $result["delete_flag"];
        $insert_date = isset($option["insert_date"]) ? $option["insert_date"] : $result["insert_date"];
        $insert_time = isset($option["insert_time"]) ? $option["insert_time"] : $result["insert_time"];
        $insert_dt = isset($option["insert_dt"]) ? $option["insert_dt"] : $result["insert_dt"];
        $update_date = isset($option["update_date"]) ? $option["update_date"] : $result["update_date"];
        $update_time = isset($option["update_time"]) ? $option["update_time"] : $result["update_time"];
        $update_dt = isset($option["update_dt"]) ? $option["update_dt"] : $result["update_dt"];
        //컬럼 최대길이
        $name_len = 0;
        $type_len = 0;
        $null_len = 0;
        $default_len = 0;
        foreach ($table_info["columns"] as $k => $v) {
            //컬럼명
            if (strlen("`{$v[0]}`") > $name_len) {
                $name_len = strlen("`{$v[0]}`");
            }
            //자료형
            $temp_len = in_array($v[1], array("primary", "foreign")) ? strlen($table_info["primary_type"]) : strlen($v[1]);
            if ($temp_len > $type_len) {
                $type_len = $temp_len;
            }
            //null 여부
            $temp_len = $v[1] == "primary" ? strlen("not null") : strlen("null");
            if ($temp_len > $null_len) {
                $null_len = $temp_len;
            }
            //기본값
            $temp_len = strlen("default null");
            if ($v[1] == "primary") {
                $temp_len = stristr($table_info["primary_type"], "int") ? strlen("auto_increment") : 0;
            } else if (isset($v[4])) {
                if (!stristr($v[4], "current_timestamp()")) {
                    $temp_len = strlen("default '{$v[4]}'");
                } else if ($info["charset"] == "utf8mb4") {
                    $temp_len = strlen("default {$v[4]}");
                }
            }
            if ($temp_len > $default_len) {
                $default_len = $temp_len;
            }
        }
        //쿼리문 생성
        $sql = "create table if not exists `{$prefix}{$table}` (";
        $primary_arr = array();
        $index_arr = array();
        foreach ($table_info["columns"] as $k => $v) {
            $default_value = "default null";
            if ($v[1] == "primary") {
                $default_value = stristr($table_info["primary_type"], "int") ? "auto_increment" : "";
            } else if (isset($v[4])) {
                if (!stristr($v[4], "current_timestamp()")) {
                    $default_value = "default '{$v[4]}'";
                } else if ($info["charset"] == "utf8mb4") {
                    $default_value = "default {$v[4]}";
                }
            }
            $sql .= $k == 0 ? "" : ",";
            $sql .= "\n    "
                . $this->str_pad("`{$v[0]}`", $name_len)
                . " "
                . $this->str_pad(in_array($v[1], array("primary", "foreign")) ? $table_info["primary_type"] : $v[1], $type_len)
                . " "
                . $this->str_pad($v[1] == "primary" ? "not null" : "null", $null_len)
                . " "
                . $this->str_pad($default_value, $default_len)
                . " comment '{$v[2]}'";
            if ($v[1] == "primary") {
                $primary_arr[] = $v[0];
            } else if ($v[1] == "foreign") {
                $index_arr[] = $v[0];
            } else if ($v[3]) {
                $index_arr[] = $v[0];
            }
        }
        foreach ($primary_arr as $temp) {
            $sql .= ",\n    primary key (`{$temp}`)";
        }
        foreach ($index_arr as $temp) {
            $sql .= ",\n    index (`{$temp}`)";
        }
        $sql .= "\n) ENGINE={$info["engine"]} DEFAULT CHARSET={$info["charset"]} COLLATE={$info["collate"]} COMMENT='{$table_info["comment"]}';";
        $return_arr[] = $sql;
        //기본데이터 없는경우 sql문 리턴
        if (count($table_info["data"]) == 0) {
            return $return_arr;
        }
        $add_sql = array();
        //현재일시(now()를 사용하지 않는 이유는 날짜형식이 YmdHis인 경우가 있어서)
        $sql = "
            select date_format(now(), '%Y%m%d%H%i%s') as dt
        ";
        $result = $this->db_row_array($sql, array(), $database);
        $db_dt = $result["dt"];
        $db_d = substr($db_dt, 0, 8);
        $db_t = substr($db_dt, 8, 6);
        foreach ($table_info["data"] as $k => $v) {
            $into_arr = array();
            $values_arr = array();
            $primary_field = "";
            $primary_value = "";
            foreach ($table_info["columns"] as $kk => $vv) {
                $column_text = $vv[0];
                $type_text = $vv[1];
                if (isset($v[$kk])) {
                    $temp = addslashes($v[$kk]);
                    $values_arr[] = "'{$temp}'";
                } else if (in_array($column_text, $insert_dt) || in_array($column_text, $update_dt)) {
                    $values_arr[] = "'{$db_dt}'";
                } else if (in_array($column_text, $insert_date) || in_array($column_text, $update_date)) {
                    $values_arr[] = "'{$db_d}'";
                } else if (in_array($column_text, $insert_time) || in_array($column_text, $update_time)) {
                    $values_arr[] = "'{$db_t}'";
                } else if ($column_text == $delete_flag) {
                    $values_arr[] = "'n'";
                } else if (isset($vv[4])) {
                    $temp = addslashes($vv[4]);
                    $values_arr[] = "'{$temp}'";
                } else {
                    continue;
                }
                $into_arr[] = "`{$column_text}`";
                //기본키값 설정한경우
                if ($type_text == "primary") {
                    $primary_field = $column_text;
                    $primary_value = $v[$kk];
                }
            }
            $into_text = implode(", ", $into_arr);
            $values_text = implode(", ", $values_arr);
            if ($primary_field == "") {
                $add_sql[] = "insert into `{$prefix}{$table}`({$into_text}) values ({$values_text});";
            } else {
                $return_arr[] = "insert into `{$prefix}{$table}`({$into_text}) select {$values_text} from dual where not exists (select 1 from `{$prefix}{$table}` where `{$primary_field}` = '{$primary_value}');";
            }
        }
        return array_merge($return_arr, $add_sql);
    }

    /**
     * - 테이블 DDL 배열 반환
     * - db/ddl 폴더 내 {$database}/{$table}.json 파일 설정필요
     * - 자료형 문자열이 타입사전 키값중에 있는경우 해당 자료형과 기본값으로 대체
     * - 전체 컬럼에서 primary 자료형은 한개만 설정가능
     * 
     * require  2026.01.02 decode_json
     * @version 2026.01.02
     * 
     * @param  string $table    테이블명
     * @param  string $database 사용할 db
     * @return array            DDL 배열, 실패시 빈배열
     * - `string [primary_type="int"]` 기본키 자료형
     * - `string [comment=""]`         테이블설명
     * - `string [columns][][0]`       컬럼명
     * - `string [columns][][1]`       자료형, primary, foreign 은 primary_type 값으로 치환됨
     * - `string [columns][][2]`       컬럼설명
     * - `bool   [columns][][3]`       인덱스여부, primary, foreign은 true
     * - `string [columns][][4]`       기본값, 설정 안한경우 default null
     * - `array  [data][]`             컬럼 순서대로 값 설정, null 또는 설정 안한경우 기본값으로
     */
    function db_table_ddl($table, $database = "default") {
        $file = dirname(__FILE__) . "/db/ddl/{$database}/{$table}.json";
        if (!file_exists($file)) {
            return array();
        }
        $arr = $this->decode_json(file_get_contents($file));
        //배열이 유효하지 않은경우
        if (!isset($arr["columns"]) || !is_array($arr["columns"])) {
            return array();
        }
        /*
         * 타입사전
         * [{변수명}][0]:string 자료형
         * [{변수명}][1]:string 기본값, 설정 안한경우 null
         */
        $type_dictionary = array(
            "bigint" => array("bigint(20)", "0"),
            "date" => array("date"),
            "datetime" => array("datetime"),
            "decimal" => array("decimal(5,2)", "0"),
            "decimal2" => array("decimal(9,6)", "0"),
            "flag" => array("varchar(1)", "n"),
            "int" => array("int(11)", "0"),
            "mediumtext" => array("mediumtext"),
            "text" => array("text"),
            "time" => array("time"),
            "varchar" => array("varchar(191)"),
            "varchar2" => array("varchar(255)")
        );
        //기본값 설정
        if (!isset($arr["primary_type"])) {
            $arr["primary_type"] = "int";
        }
        if (!isset($arr["comment"])) {
            $arr["comment"] = "";
        }
        if (!isset($arr["data"])) {
            $arr["data"] = array();
        }
        //타입사전 적용
        if (isset($type_dictionary[$arr["primary_type"]])) {
            $arr["primary_type"] = $type_dictionary[$arr["primary_type"]][0];
        }
        foreach ($arr["columns"] as $k => $v) {
            //trim, strtolower
            for ($i = 0; $i < 3; $i++) {
                if (!isset($v[$i])) {
                    $arr["columns"][$k][$i] = $v[$i] = "";
                    continue;
                }
                //자료형
                if ($i == 1) {
                    $v[$i] = strtolower($v[$i]);
                }
                $arr["columns"][$k][$i] = $v[$i] = trim($v[$i]);
            }
            $type_key = $v[1];
            //자료형 변경
            if (!isset($type_dictionary[$type_key])) {
                continue;
            }
            $arr["columns"][$k][1] = $type_dictionary[$type_key][0];
            //기본값 변경
            if (isset($v[4]) || !isset($type_dictionary[$type_key][1])) {
                continue;
            }
            $arr["columns"][$k][4] = $type_dictionary[$type_key][1];
        }
        return $arr;
    }

    /**
     * - 백업이 저장된 곳 데이터베이스를 이용하여 복구
     * - 백업방법은 db_table_backup() 함수 참조
     * 
     * require  2026.01.02 db_add_table_info db_insert db_query db_row_array db_table_create_sql db_table_ddl
     * @version 2026.01.02
     * 
     * @param array  $target   복구대상 데이터베이스 배열
     * - `string [{데이터베이스명}][]` 테이블명
     * @param string $database 백업이 저장된 곳 데이터베이스
     */
    function db_table_restore($target, $database = "default") {
        foreach ($target as $db => $tbs) {
            foreach ($tbs as $tb) {
                //테이블 ddl
                $result = $this->db_table_ddl($tb, $db);
                //ddl 없는경우 백업 안함
                if (count($result) == 0) {
                    trigger_error("복구하려는 database:{$db}, table:{$tb} DDL이 존재하지 않습니다.");
                    continue;
                }
                //ddl, 쿼리정보 생성
                $primary = "";
                foreach ($result["columns"] as $temp) {
                    $select[] = "`{$temp[0]}`";
                    if ($temp[1] == "primary") {
                        if ($primary != "") {
                            $primary = "";
                            break;
                        }
                        $primary = $temp[0];
                    }
                }
                if ($primary == "") {
                    trigger_error("복구하려는 database:{$db}, table:{$tb} primary는 1개여야 합니다.");
                    continue;
                }
                //information for backup
                $result = $this->db_add_table_info($tb, $db);
                $prefix = $result["prefix"];
                //target 쿼리문 생성
                $target_sql = "select " . implode(", ", $select) . " from `{$prefix}{$tb}`";
                //테이블 없는경우 생성
                $result = $this->db_table_create_sql($tb, array(), $db);
                $this->db_query($result[0], array(), $db);
                //Insert for backup
                for ($current_idx = null; true; $current_idx = $idx) {
                    $where = "";
                    if ($current_idx !== null) {
                        $where = "where `{$primary}` > '{$current_idx}'";
                    }
                    $sql = "{$target_sql} {$where} order by `{$primary}` limit 1";
                    $result = $this->db_row_array($sql, array(), $database);
                    $idx = $result[$primary];
                    if (is_null($idx)) {
                        break;
                    }
                    //row 생성
                    $row = array();
                    foreach ($result as $k => $v) {
                        if (is_null($v)) {
                            $row["{$k} is"] = "null";
                        } else {
                            $row[$k] = $v;
                        }
                    }
                    //insert
                    $option = array(
                        "row" => $row,
                        "where" => array($primary => $idx)
                    );
                    $this->db_insert($tb, $option, $db);
                }
            }
        }
    }

    /**
     * - 테이블 업데이트(1개)
     * - 중복체크 후 업데이트 하려는경우 primary, add_where 값 설정
     * 
     * require  2026.02.06 db_add_row db_add_table_info db_create_row db_create_where db_query
     * @version 2026.02.06
     * 
     * @param  string $table    테이블명
     * @param  array  $option   옵션
     * - `array  [row=array()]`       수정할 값, 키는 컬럼명, 값은 컬럼값
     * - `array  [where=array()]`     수정 조건문(중복체크 하는경우 기본키 필수), 키는 컬럼명, 값은 컬럼값
     * - `bool   [or_bool=false]`     true: where or문, false: where and문
     * - `string [primary=""]`        중복체크시 사용되는 기본키 컬럼명
     * - `array  [add_where=array()]` 중복체크 조건문, 키는 컬럼명, 값은 컬럼값
     * - `bool   [add_or_bool=false]` true: 중복체크 where or문, false: 중복체크 where and문
     * - `string [prefix=null]`       테이블 접두어, 세팅 안한경우 설정값
     * - `array  [update_date=null]`  수정일, 세팅 안한경우 설정값
     * - `array  [update_time=null]`  수정시, 세팅 안한경우 설정값
     * - `array  [update_dt=null]`    수정일시, 세팅 안한경우 설정값
     * @param  string $database 사용할 db명
     * @return int              affected_rows(수정 안된경우 0)
     */
    function db_update($table, $option = array(), $database = "default") {
        $main_row = isset($option["row"]) ? $option["row"] : array();
        $main_where = isset($option["where"]) ? $option["where"] : array();
        $or_bool = isset($option["or_bool"]) ? $option["or_bool"] : false;
        $main_primary = isset($option["primary"]) ? trim(strtolower($option["primary"])) : "";
        $main_add_where = isset($option["add_where"]) ? $option["add_where"] : array();
        $add_or_bool = isset($option["add_or_bool"]) ? $option["add_or_bool"] : false;
        $result = $this->db_add_table_info($table, $database);
        $prefix = isset($option["prefix"]) ? $option["prefix"] : $result["prefix"];
        $update_date = isset($option["update_date"]) ? $option["update_date"] : $result["update_date"];
        $update_time = isset($option["update_time"]) ? $option["update_time"] : $result["update_time"];
        $update_dt = isset($option["update_dt"]) ? $option["update_dt"] : $result["update_dt"];
        $where_info = $this->db_create_where($main_where, $or_bool);
        $option = array(
            "date" => $update_date,
            "time" => $update_time,
            "datetime" => $update_dt
        );
        $row_arr = $this->db_add_row($main_row, $option);
        $row_info = $this->db_create_row($row_arr);
        if ($main_primary != "" && count($main_add_where) > 0) {
            $primary_key = "";
            foreach ($main_where as $k => $v) {
                $temp = explode(" ", trim($k));
                if ($main_primary == trim(str_replace("`", "", strtolower($temp[0])))) {
                    $primary_key = $v;
                    break;
                }
            }
            $add_where_info = $this->db_create_where($main_add_where, $add_or_bool, 5);
            $sq = "";
            $sq .= " and\n";
            $sq .= "    (\n";
            $sq .= "        select\n";
            $sq .= "            `cnt`\n";
            $sq .= "        from (\n";
            $sq .= "            select\n";
            $sq .= "                count(*) as `cnt`\n";
            $sq .= "            from\n";
            $sq .= "                `{$prefix}{$table}`\n";
            $sq .= "            where\n";
            $sq .= "                `{$main_primary}` <> ? and\n";
            $sq .= "                (\n";
            $sq .= "                    {$add_where_info["where"]}\n";
            $sq .= "                )\n";
            $sq .= "        ) as `t1`\n";
            $sq .= "    ) = 0";
            $where_info["where"] .= $sq;
            $where_info["binding"] = array_merge($where_info["binding"], array($primary_key), $add_where_info["binding"]);
        }
        $sq = "";
        $sq .= "update\n";
        $sq .= "    `{$prefix}{$table}`\n";
        $sq .= "set";
        $sq .= "    {$row_info["set"]}\n";
        $sq .= "where\n";
        $sq .= "    {$where_info["where"]}";
        $sql = $sq;
        $binding = array_merge($row_info["binding"], $where_info["binding"]);
        $this->db_query($sql, $binding, $database);
        return $this->db_affected_rows;
    }
// #endregion
// #region @ukp decode
    /**
     * 11st xml decode  
     *   
     * require  2025.01.17 decode_xml
     * @version 2025.01.17
     *
     * @param  string $xml xml
     * @return array       배열
     */
    function decode_11st_xml($xml) {
        $content = str_ireplace(array("<ns2:", "</ns2:", " xmlns:ns2=", ' encoding="euc-kr"'), array("<", "</", " xmlns=", ' encoding="utf-8"'), preg_replace('/[^[:graph:]\s]/u', "", mb_convert_encoding($xml, "UTF-8", "EUC-KR")));
        $arr = $this->decode_xml($content);
        return $arr;
    }

    /**
     * base32 decode by Bryan Ruiz  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     * 
     * @param  string $input base32
     * @return string        문자열
     */
    function decode_base32($input) {
        if (empty($input)) {
            return "";
        }
        $map = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ234567");
        $flipped_map = array_flip($map);
        $padding_char_count = substr_count($input, "=");
        $allowed_value = array(6, 4, 3, 1, 0);
        if (!in_array($padding_char_count, $allowed_value)) {
            return "";
        }
        for ($i = 0; $i < 4; $i++) {
            if ($padding_char_count == $allowed_value[$i] && substr($input, - ($allowed_value[$i])) != str_repeat("=", $allowed_value[$i])) {
                return "";
            }
        }
        $input = str_split(str_replace('=', '', $input));
        $binary_string = "";
        $input_cnt = count($input);
        for ($i = 0; $i < $input_cnt; $i += 8) {
            $x = "";
            if (!in_array($input[$i], $map)) {
                return "";
            }
            for ($j = 0; $j < 8; $j++) {
                $temp = isset($input[$i + $j]) ? $flipped_map[$input[$i + $j]] : "";
                $x .= str_pad(base_convert($temp, 10, 2), 5, '0', STR_PAD_LEFT);
            }
            $eight_bits = str_split($x, 8);
            foreach ($eight_bits as $temp) {
                $y = chr(base_convert($temp, 2, 10));
                $binary_string .= ($y || ord($y) == 48) ? $y : "";
            }
        }
        return $binary_string;
    }

    /**
     * base64 decode  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     * 
     * @param  string $text base64 텍스트
     * @return string       텍스트
     */
    function decode_base64($text) {
        return base64_decode(str_replace(array("-", "_"), array("+", "/"), $text));
    }

    /**
     * DER decode  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     * 
     * @param  string $der    the binary data in DER format
     * @param  int    $offset the offset of the data stream containing the object
     * @return array          [$offset, $data] the new offset and the decoded object
     */
    function decode_der($der, $offset = 0) {
        $pos = $offset;
        $size = strlen($der);
        $constructed = (ord($der[$pos]) >> 5) & 0x01;
        $type = ord($der[$pos++]) & 0x1f;

        // Length
        $len = ord($der[$pos++]);
        if ($len & 0x80) {
            $n = $len & 0x1f;
            $len = 0;
            while ($n-- && $pos < $size) {
                $len = ($len << 8) | ord($der[$pos++]);
            }
        }

        // Value
        if ($type == $this->custom_asn1_bit_string) {
            $pos++; // Skip the first contents octet (padding indicator)
            $data = substr($der, $pos, $len - 1);
            $pos += $len - 1;
        } else if (!$constructed) {
            $data = substr($der, $pos, $len);
            $pos += $len;
        } else {
            $data = null;
        }

        return array($pos, $data);
    }

    /**
     * html decode(&amp; &lt; &gt; &quot;)  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     * 
     * @param  string $text 인코딩 텍스트
     * @return string       html코드
     */
    function decode_html($text) {
        return htmlspecialchars_decode($text, ENT_COMPAT);
    }

    /**
     * - JSON 디코딩
     * 
     * require  2025.01.17
     * @version 2025.01.17
     *
     * @param  string $json JSON형태의 문자열
     * @return array        배열
     */
    function decode_json($json) {
        $content = json_decode($json, true);
        return is_array($content) ? $content : array();
    }

    /**
     * nhn xml decode  
     *   
     * require  2025.01.17 array_value, decode_xml
     * @version 2025.01.17
     *
     * @param  string $xml xml
     * @return array       배열
     */
    function decode_nhn_xml($xml) {
        $content = explode("<soapenv:Body>", $xml);
        $content = explode("</soapenv:Body>", $this->array_value($content, 1));
        $content = str_replace(array("<n:", "</n:"), array("<", "</"), $content[0]);
        $arr = array();
        if ($content != "") {
            $arr = $this->decode_xml($content);
        }
        return $arr;
    }

    /**
     * UCS2 변환  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     *
     * @param  string $text 변환할 문자열
     * @return string       변환된 문자열
     */
    function decode_ucs2($text) {
        return html_entity_decode($text);
    }

    /**
     * xml 디코딩 (root 포함된 배열 반환, 네임스페이스 안됨)  
     *   
     * require  2025.01.17 decode_json encode_json
     * @version 2025.01.17
     *
     * @param  string $xml xml
     * @return array       배열
     */
    function decode_xml($xml) {
        $simple_xml = simplexml_load_string($xml);
        $arr = array(
            $simple_xml->getName() => $this->decode_json($this->encode_json(simplexml_load_string($xml)))
        );
        return $arr;
    }
// #endregion
// #region @ukp decrypt
    /**
     * AES-128/CBC,ECB 복호화  
     * pkcs5padding, pkcs7padding 두 방식은 서로 같음  
     * ECB방식은 iv값 사용하지 않음(공백으로 두면 됨)  
     *   
     * require  2025.06.17 str_pkcs7_unpadding
     * @version 2025.06.17
     *
     * @param  string $text     암호화문자열
     * @param  string $key      복호화 키
     * @param  string $iv       복호화 iv(ecb인경우 공백으로 두면 됨)
     * @param  bool   $cbc_bool true: CBC, false: ECB(기본값)
     * @return string           평문자열, 실패시 빈문자열
     */
    function decrypt_aes128($text, $key, $iv = "", $cbc_bool = false) {
        $return_str = "";
        if (strlen($key) != 16) {
            return $return_str;
        }
        if ($cbc_bool && strlen($iv) != 16) {
            return $return_str;
        }
        if (version_compare(phpversion(), '5.3.0', '>=')) {
            $return_str = openssl_decrypt($text, $cbc_bool ? "AES-128-CBC" : "AES-128-ECB", $key, 0, $iv);
        } else {
            eval('$return_str = $this->str_pkcs7_unpadding(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, base64_decode($text), $cbc_bool ? MCRYPT_MODE_CBC : MCRYPT_MODE_ECB, $iv));');
        }
        return $return_str;
    }

    /**
     * - AES-256/CBC,ECB 복호화  
     * - pkcs5padding, pkcs7padding 두 방식은 서로 같음  
     * - ECB방식은 iv값 사용하지 않음(공백으로 두면 됨)  
     *   
     * require  2025.06.17 str_pkcs7_unpadding
     * @version 2025.06.17
     *
     * @param  string $text     암호화문자열
     * @param  string $key      복호화 키
     * @param  string $iv       복호화 iv(ecb인경우 공백으로 두면 됨)
     * @param  bool   $cbc_bool true: CBC, false: ECB(기본값)
     * @return string           평문자열, 실패시 빈문자열
     */
    function decrypt_aes256($text, $key, $iv = "", $cbc_bool = false) {
        $return_str = "";
        if (strlen($key) != 32) {
            return $return_str;
        }
        if ($cbc_bool && strlen($iv) != 16) {
            return $return_str;
        }
        if (version_compare(phpversion(), '5.3.0', '>=')) {
            $return_str = openssl_decrypt($text, $cbc_bool ? "AES-256-CBC" : "AES-256-ECB", $key, 0, $iv);
        } else {
            eval('$return_str = $this->str_pkcs7_unpadding(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, base64_decode($text), $cbc_bool ? MCRYPT_MODE_CBC : MCRYPT_MODE_ECB, $iv));');
        }
        return $return_str;
    }

    /**
     * nhn decrypt  
     *   
     * require  2025.01.17 decrypt_aes128
     * @version 2025.01.17
     *
     * @param  string $text       암호화문자열
     * @param  string $secret_key 비밀키
     * @param  string $iv         iv
     * @param  string $timestamp  nhn timestamp
     * @return string             평문
     */
    function decrypt_nhn($text, $secret_key, $iv, $timestamp) {
        $iv = pack("H*", $iv);
        $temp = "";
        $signature = hash_hmac("sha256", $timestamp, $secret_key, true);
        for ($i = 0; $i < 16; $i++) {
            $temp .= substr($signature, $i, 1) ^ substr($signature, $i + 16, 1);
        }
        $secret = pack("H*", bin2hex($temp));
        return $this->decrypt_aes128($text, $secret, $iv, true);
    }

    /**
     * 티몬 복호화  
     *   
     * require  2025.01.17 decrypt_aes128
     * @version 2025.01.17
     *
     * @param  string $text       암호문
     * @param  string $secret_key 시크릿키
     * @return string             평문
     */
    function decrypt_tmon($text, $secret_key) {
        return $this->decrypt_aes128($text, $secret_key);
    }
// #endregion
// #region @ukp encode
    /**
     * base32 encode by Bryan Ruiz  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     * 
     * @param  string $input        문자열
     * @param  bool   $padding_bool padding 여부
     * @return string               base32
     */
    function encode_base32($input, $padding_bool = true) {
        if (empty($input)) {
            return "";
        }
        $map = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ234567");
        $input = str_split($input);
        $binary_string = "";
        foreach ($input as $temp) {
            $binary_string .= str_pad(base_convert(ord($temp), 10, 2), 8, '0', STR_PAD_LEFT);
        }
        $five_bit_binary_array = str_split($binary_string, 5);
        $base32 = "";
        foreach ($five_bit_binary_array as $temp) {
            $base32 .= $map[base_convert(str_pad($temp, 5, '0'), 2, 10)];
        }
        if ($padding_bool && ($x = strlen($binary_string) % 40) != 0) {
            if ($x == 8) {
                $base32 .= str_repeat("=", 6);
            } else if ($x == 16) {
                $base32 .= str_repeat("=", 4);
            } else if ($x == 24) {
                $base32 .= str_repeat("=", 3);
            } else if ($x == 32) {
                $base32 .= "=";
            }
        }
        return $base32;
    }

    /**
     * base64 encode  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     * 
     * @param  string $text          텍스트
     * @param  bool   $url_safe_bool url safe 여부
     * @return string                base64 텍스트
     */
    function encode_base64($text, $url_safe_bool = false) {
        $enc_text = base64_encode($text);
        if ($url_safe_bool) {
            $enc_text = str_replace(array("+", "/", "="), array("-", "_", ""), $enc_text);
        }
        return $enc_text;
    }

    /**
     * DER encode  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     * 
     * @param  int    $type  DER tag
     * @param  bool   $value the value to encode
     * @return string        the encoded object
     */
    function encode_der($type, $value) {
        $tag_header = 0;
        if ($type === $this->custom_asn1_sequence) {
            $tag_header |= 0x20;
        }
        // Type
        $der = chr($tag_header | $type);
        // Length
        $der .= chr(strlen($value));
        return $der . $value;
    }

    /**
     * html encode(&amp; &lt; &gt; &quot;)  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     * 
     * @param  string $html               html코드
     * @param  bool   $double_encode_bool 이중변환여부
     * @return string                     인코딩 텍스트
     */
    function encode_html($html, $double_encode_bool = true) {
        return htmlspecialchars($html, ENT_COMPAT, null, $double_encode_bool);
    }

    /**
     * - JSON 인코딩
     * 
     * require  2025.01.17
     * @version 2025.01.17
     *
     * @param  array  $arr 배열
     * @return string      JSON형태의 문자열
     */
    function encode_json($arr) {
        //php 5.4버전 이상인경우
        if (version_compare(phpversion(), '5.4.0', '>=')) {
            return json_encode($arr, JSON_UNESCAPED_UNICODE);
            //php 5.2, 5.3버전인경우
        } else {
            $param1 = '/(\\\u[a-f0-9]+)+/';
            $param2 = '$s';
            $param3 = '$json = json_decode(\'{"s":"\'.$s[0].\'"}\'); return reset($json);';
            $return_str = "";
            eval('$return_str = preg_replace_callback($param1, create_function($param2, $param3), json_encode($arr));');
            return $return_str;
        }
    }

    /**
     * jsonp 문자열 반환  
     * callback은 request로 받아옴  
     * 배열은 json문자열로 변환  
     *   
     * require  2025.01.17 encode_json input_request
     * @version 2025.01.17
     * 
     * @param  string|array $data 데이터
     * @param  string       $name request name
     * @return array
     */
    function encode_jsonp($data, $name = "callback") {
        $callback = $this->input_request($name);
        if (is_array($data)) {
            $data = $this->encode_json($data);
        }
        $text = str_replace("'", "\\'", $data);
        return "{$callback}('{$text}')";
    }

    /**
     * xml 인코딩 (root가 배열에 포함, 네임스페이스 안됨)  
     *   
     * require  2025.01.17 custom_add_xml_element
     * @version 2025.01.17
     *
     * @param  array  $arr 배열
     * @return string      xml
     */
    function encode_xml($arr) {
        $root = key($arr);
        $xml = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"{$this->charset}\"?><{$root}></{$root}>");
        $this->custom_add_xml_element($xml, $arr[$root]);
        return $xml->asXML();
    }
// #endregion
// #region @ukp encrypt
    /**
     * AES-128/CBC,ECB 암호화  
     * pkcs5padding, pkcs7padding 두 방식은 서로 같음  
     * ECB방식은 iv값 사용하지 않음(공백으로 두면 됨)  
     *   
     * require  2025.06.17 str_pkcs7_padding
     * @version 2025.06.17
     *
     * @param  string $text     평문자열
     * @param  string $key      암호화 키
     * @param  string $iv       암호화 iv(ecb인경우 공백으로 두면 됨)
     * @param  bool   $cbc_bool true: CBC, false: ECB(기본값)
     * @return string           암호화문자열, 실패시 빈문자열
     */
    function encrypt_aes128($text, $key, $iv = "", $cbc_bool = false) {
        $return_str = "";
        if (strlen($key) != 16) {
            return $return_str;
        }
        if ($cbc_bool && strlen($iv) != 16) {
            return $return_str;
        }
        if (version_compare(phpversion(), '5.3.0', '>=')) {
            return openssl_encrypt($text, $cbc_bool ? "AES-128-CBC" : "AES-128-ECB", $key, 0, $iv);
        } else {
            eval('$return_str = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $this->str_pkcs7_padding($text), $cbc_bool ? MCRYPT_MODE_CBC : MCRYPT_MODE_ECB, $iv));');
        }
        return $return_str;
    }

    /**
     * - AES-256/CBC,ECB 암호화  
     * - pkcs5padding, pkcs7padding 두 방식은 서로 같음  
     * - ECB방식은 iv값 사용하지 않음(공백으로 두면 됨)  
     *   
     * require  2025.06.17 str_pkcs7_padding
     * @version 2025.06.17
     *
     * @param  string $text     평문자열
     * @param  string $key      암호화 키
     * @param  string $iv       암호화 iv(ecb인경우 공백으로 두면 됨)
     * @param  bool   $cbc_bool true: CBC, false: ECB(기본값)
     * @return string           암호화문자열, 실패시 빈문자열
     */
    function encrypt_aes256($text, $key, $iv = "", $cbc_bool = false) {
        $return_str = "";
        if (strlen($key) != 32) {
            return $return_str;
        }
        if ($cbc_bool && strlen($iv) != 16) {
            return $return_str;
        }
        if (version_compare(phpversion(), '5.3.0', '>=')) {
            return openssl_encrypt($text, $cbc_bool ? "AES-256-CBC" : "AES-256-ECB", $key, 0, $iv);
        } else {
            eval('$return_str = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $this->str_pkcs7_padding($text), $cbc_bool ? MCRYPT_MODE_CBC : MCRYPT_MODE_ECB, $iv));');
        }
        return $return_str;
    }

    /**
     * nhn encrypt  
     *   
     * require  2025.01.17 encrypt_aes128
     * @version 2025.01.17
     *
     * @param  string $text       평문
     * @param  string $secret_key 비밀키
     * @param  string $iv         iv
     * @return array  [text]      암호문  
     *                [timestamp] 타임스템프
     */
    function encrypt_nhn($text, $secret_key, $iv) {
        $microtime = explode(" ", microtime());
        $datetime = str_replace(" ", "T", gmdate("Y-m-d H:i:s", $microtime[1]));
        $rand = sprintf("%04d", mt_rand(0, 9999));
        $timestamp = $datetime . substr($microtime[0], 1, 4) . "Z" . $rand;
        $iv = pack("H*", $iv);
        $temp = "";
        $signature = hash_hmac("sha256", $timestamp, $secret_key, true);
        for ($i = 0; $i < 16; $i++) {
            $temp .= substr($signature, $i, 1) ^ substr($signature, $i + 16, 1);
        }
        $secret = pack("H*", bin2hex($temp));
        return array(
            "text" => $this->encrypt_aes128($text, $secret, $iv, true),
            "timestamp" => $timestamp
        );
    }

    /**
     * 티몬 암호화  
     *   
     * require  2025.01.17 encrypt_aes128
     * @version 2025.01.17
     *
     * @param  string $text       평문
     * @param  string $secret_key 시크릿키
     * @return string             암호문
     */
    function encrypt_tmon($text, $secret_key) {
        return $this->encrypt_aes128($text, $secret_key);
    }
// #endregion
// #region @ukp input
    /**
     * 현재 실행중인 php파일  
     *   
     * require  2025.10.30 input_server str_simplify_path
     * @version 2025.10.30
     * 
     * @return array         배열  
     *         string [dir]  절대경로  
     *         string [base] 파일명
     */
    function input_current_php() {
        $file_name = $this->input_server("script_filename");
        $pwd = substr($file_name, 0, 1) == "/" ? "" : ($this->input_server("pwd") . "/");
        $file = $this->str_simplify_path($pwd . $file_name);
        return array(
            "dir" => dirname($file),
            "base" => basename($file)
        );
    }

    /**
     * 파일정보  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     *
     * @param  string $name       파일 태그 name속성
     * @param  bool   $array_bool true - 배열이름, false - 단일이름
     * @return array  [name]  
     *                [type]  
     *                [tmp_name]  
     *                [error]  
     *                [size]
     */
    function input_file($name, $array_bool = false) {
        if ($array_bool) {
            if (!isset($_FILES[$name])) {
                return array();
            }
            $arr = array();
            foreach ($_FILES[$name]["name"] as $k => $v) {
                $arr[] = array(
                    "name" => $_FILES[$name]["name"][$k],
                    "type" => $_FILES[$name]["type"][$k],
                    "tmp_name" => $_FILES[$name]["tmp_name"][$k],
                    "error" => $_FILES[$name]["error"][$k],
                    "size" => $_FILES[$name]["size"][$k]
                );
            }
            return $arr;
        } else {
            $arr = array(
                "name" => "",
                "type" => "",
                "tmp_name" => "",
                "error" => 0,
                "size" => 0
            );
            return isset($_FILES[$name]) ? $_FILES[$name] : $arr;
        }
    }

    /**
     * 파일업로드  
     *   
     * require  2025.01.17 unique_id
     * @version 2025.01.17
     *
     * @param  string $name             파일 태그 name속성
     * @param  string $src              저장폴더
     * @param  array  $allow_ext        업로드 허용 확장자(.제외)
     * @param  bool   $unique_name_bool true인경우 고유파일명 false인경우 업로드한 파일명
     * @return bool
     */
    function input_file_upload($name = "file", $src = ".", $allow_ext = array(), $unique_name_bool = false) {
        //파일존재확인
        if (!isset($_FILES[$name])) {
            $this->input_upload_info["code"] = "2";
            return false;
        }
        //폴더존재확인
        if (!is_dir($src)) {
            $this->input_upload_info["code"] = "3";
            return false;
        }
        //윈도우 아닌경우 쓰기권한 확인
        if (strncasecmp(PHP_OS, "win", 3) != 0 && !is_writable($src)) {
            $this->input_upload_info["code"] = "3";
            return false;
        }
        //업로드파일 확장자
        $temp_name = explode(".", $_FILES[$name]["name"]);
        $ext = count($temp_name) == "0" ? "" : strtolower($temp_name[count($temp_name) - 1]);
        //true인경우 고유파일명 false인경우 업로드한 파일명
        if ($unique_name_bool) {
            $file_name = $this->unique_id();
        } else {
            $file_name = str_replace("." . $ext, "", $_FILES[$name]["name"]);
        }
        $temp_num = "";
        foreach ($allow_ext as $temp) {
            if ($temp == $ext) {
                for ($i = 1; file_exists("{$src}/{$file_name}{$temp_num}.{$ext}"); $i++) {
                    $temp_num = "_{$i}";
                }
                move_uploaded_file($_FILES[$name]["tmp_name"], "{$src}/{$file_name}{$temp_num}.{$ext}");

                $this->input_upload_info["code"] = "1";
                $this->input_upload_info["name"] = "{$file_name}{$temp_num}";
                $this->input_upload_info["ext"] = "{$ext}";
                $this->input_upload_info["full_name"] = "{$file_name}{$temp_num}.{$ext}";
                $this->input_upload_info["src"] = "{$src}";
                return true;
            }
        }
        //확장자 없음
        $this->input_upload_info["code"] = "4";
        return false;
    }

    /**
     * 배열파일 일괄업로드  
     *   
     * require  2025.01.17 input_file unique_id
     * @version 2025.01.17
     *
     * @param  string $name                  파일 태그 name속성
     * @param  string $src                   저장폴더
     * @param  array  $allow_ext             업로드 허용 확장자(.제외)
     * @param  bool   $unique_name_bool      true인경우 고유파일명 false인경우 업로드한 파일명
     * @return array  [success_bool]         true: 성공, false: 업로드할 폴더 없음  
     *                [list][][success_bool] true: 성공, false: 허용확장자 아님  
     *                [list][][name]         업로드 파일명  
     *                [list][][ext]          업로드 파일 확장자  
     *                [list][][full_name]    확장자 포함 파일명
     */
    function input_file_upload_arr($name = "file", $src = ".", $allow_ext = array(), $unique_name_bool = false) {
        $return_arr = array(
            "success_bool" => false,
            "list" => array()
        );
        //폴더존재확인
        if (!is_dir($src)) {
            return $return_arr;
        }
        //윈도우 아닌경우 쓰기권한 확인
        if (strncasecmp(PHP_OS, "win", 3) != 0 && !is_writable($src)) {
            return $return_arr;
        }
        $return_arr["success_bool"] = true;
        $file_list = $this->input_file($name, true);
        if (count($file_list) == 0) {
            return $return_arr;
        }
        foreach ($file_list as $temp) {
            $temp_arr = array(
                "success_bool" => false,
                "name" => "",
                "ext" => "",
                "full_name" => ""
            );
            //업로드파일 확장자
            $temp_name = explode(".", $temp["name"]);
            $ext = count($temp_name) == 0 ? "" : strtolower($temp_name[count($temp_name) - 1]);
            //true인경우 고유파일명 false인경우 업로드한 파일명
            if ($unique_name_bool) {
                $file_name = $this->unique_id();
            } else {
                $file_name = $ext == "" ? $temp["name"] : substr($temp["name"], 0, (-strlen($ext) - 1));
            }
            foreach ($allow_ext as $temp2) {
                if ($temp2 != $ext) {
                    continue;
                }
                $temp_num = "";
                for ($i = 1; file_exists("{$src}/{$file_name}{$temp_num}.{$ext}"); $i++) {
                    $temp_num = "_{$i}";
                }
                move_uploaded_file($temp["tmp_name"], "{$src}/{$file_name}{$temp_num}.{$ext}");
                $temp_arr["success_bool"] = true;
                $temp_arr["name"] = "{$file_name}{$temp_num}";
                $temp_arr["ext"] = $ext;
                $temp_arr["full_name"] = "{$file_name}{$temp_num}.{$ext}";
                break;
            }
            $return_arr["list"][] = $temp_arr;
        }
        return $return_arr;
    }

    /**
     * 파일업로드 base64(이미지만)  
     *   
     * require  2025.01.17 array_value unique_id
     * @version 2025.01.17
     *
     * @param  string $file 파일데이터
     * @param  string $src  저장폴더
     * @return bool
     */
    function input_file_upload_base64($file, $src = ".") {
        //폴더존재확인
        if (!is_dir($src)) {
            $this->input_upload_info["code"] = "3";
            return false;
        }
        //윈도우 아닌경우 쓰기권한 확인
        if (strncasecmp(PHP_OS, "win", 3) != 0 && !is_writable($src)) {
            $this->input_upload_info["code"] = "3";
            return false;
        }
        //파일처리
        $file_info = explode(";base64,", $file);
        $ext = explode("/", $file_info[0]);
        $ext = strtolower($this->array_value($ext, 1));
        //허용 확장자 아닌경우
        if (!in_array($ext, array("jpg", "jpeg", "gif", "png"))) {
            $this->input_upload_info["code"] = "4";
            return false;
        }
        $file = $this->array_value($file_info, 1);
        //파일존재확인
        if ($file == "") {
            $this->input_upload_info["code"] = "2";
            return false;
        }
        $file_name = $this->unique_id();
        $temp_num = "";
        for ($i = 0; file_exists("{$src}/{$file_name}{$temp_num}.{$ext}"); $i++) {
            $temp_num = "_{$i}";
        }
        file_put_contents("{$src}/{$file_name}{$temp_num}.{$ext}", $file);
        $this->input_upload_info["code"] = "1";
        $this->input_upload_info["name"] = "{$file_name}{$temp_num}";
        $this->input_upload_info["ext"] = "{$ext}";
        $this->input_upload_info["full_name"] = "{$file_name}{$temp_num}.{$ext}";
        $this->input_upload_info["src"] = "{$src}";
        return true;
    }

    /**
     * 파일업로드 결과  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     *
     * @return array [code]      업로드 결과코드  
     *                           0 - 업로드한적 없음  
     *                           1 - 업로드 성공  
     *                           2 - 업로드파일 없음  
     *                           3 - 업로드할 폴더 없음  
     *                           4 - 허용확장자 없음  
     *               [name]      업로드 파일명  
     *               [ext]       업로드 파일 확장자  
     *               [full_name] 확장자 포함 파일명  
     *               [src]       업로드 경로
     */
    function input_file_upload_info() {
        return $this->input_upload_info;
    }

    /**
     * - $_REQUEST 배열의 값 가져오기
     * - 키에 해당하는 값이 없는경우 $array_bool 값이 true이면 빈배열, false인경우 빈문자열
     * 
     * require  2026.02.06 array_value
     * @version 2026.02.06
     *
     * @param  string       $key        키, 공백인경우 배열전체
     * @param  bool         $array_bool 반환값형태, true - 배열, false - 문자열
     * @return string|array
     */
    function input_request($key = "", $array_bool = false) {
        $request = $this->custom_request;
        if ($key == "") {
            return $request;
        }
        return $this->array_value($request, $key, $array_bool);
    }

    /**
     * server  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     *
     * @param  string       $key        키, 공백인경우 배열전체
     * @param  bool         $upper_bool 대문자 변환여부
     * @return string|array
     */
    function input_server($key = "", $upper_bool = true) {
        if ($upper_bool) {
            $key = strtoupper($key);
        }
        if ($key == "") {
            return isset($_SERVER) ? $_SERVER : array();
        }
        return isset($_SERVER[$key]) ? $_SERVER[$key] : "";
    }
// #endregion
// #region @ukp is
    /**
     * 봇 여부  
     *   
     * require  2025.07.15 input_server
     * @version 2025.07.15
     *
     * @return bool
     */
    function is_bot() {
        $useragent = $this->input_server("http_user_agent");
        //bot문자열 있는경우 bot
        if (stristr($useragent, "bot")) {
            return true;
        }
        //운영체제 문자열 있는경우 봇 아님
        if (stristr($useragent, "Mozilla/5.0 (Macintosh") || stristr($useragent, "Mozilla/5.0 (Windows") || stristr($useragent, "Mozilla/5.0 (Linux") || stristr($useragent, "Mozilla/5.0 (iPhone")) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * magic_quotes_gpc 설정여부
     *   
     * require  2025.08.13
     * @version 2025.08.13
     *
     * @return bool
     */
    function is_magic_quotes_gpc() {
        $result = false;
        if (version_compare(phpversion(), "5.4.0", ">=")) {
            return $result;
        }
        eval('$result = get_magic_quotes_gpc();');
        return $result;
    }

    /**
     * 모바일 여부 (http://detectmobilebrowsers.com/)  
     *   
     * require  2025.07.15 input_server
     * @version 2025.07.15
     *
     * @return bool
     */
    function is_mobile() {
        $useragent = $this->input_server("http_user_agent");
        //|android|ipad|playbook|silk 추가됨(태블릿 대응)
        if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
            return true;
        } else {
            return false;
        }
    }
// #endregion
// #region @ukp log
    /**
     * - 로그저장
     * - require 없어야함
     * 
     * require  2025.10.24
     * @version 2025.10.24
     *
     * @param string $str    로그남길 문자열
     * @param string $prefix 로그파일 접두어
     */
    function log_message($str, $prefix = "") {
        $dt = date("Y-m-d H:i:s");
        $date = date("Y_m_d", strtotime($dt));
        if ($prefix != "") {
            $prefix .= "_";
        }
        //문자열 예외처리
        $message = (is_numeric($str) || is_string($str)) ? $str : var_export($str, true);
        //회원정보 있는경우 표시
        if ($this->custom_user_info != "") {
            $message .= "\n" . $this->custom_user_info;
        }
        $file = fopen(dirname(__FILE__) . "/log/{$prefix}{$date}.log", "a");
        fwrite($file, "{$dt} --> {$message}\n");
        fclose($file);
    }
// #endregion
// #region @ukp session
    /**
     * - 세션 값 불러오기
     * - `$key` 값이 null 인경우 세션 전체값 배열 반환
     * 
     * require  2026.01.08
     * @version 2026.01.08
     *
     * @param  string       $key 키
     * @return string|array      값
     */
    function session_get($key = null) {
        if ($key === null) {
            return isset($_SESSION) ? $_SESSION : array();
        }
        return isset($_SESSION[$key]) ? $_SESSION[$key] : "";
    }

    /**
     * - 세션 값 저장
     * 
     * require  2025.01.17
     * @version 2025.01.17
     *
     * @param string $key   키
     * @param string $value 값
     */
    function session_set($key, $value) {
        $_SESSION[$key] = $value;
    }

    /**
     * - 세션 시작
     * 
     * require  2026.01.29 session_start_check
     * @version 2026.01.29
     *
     * @param int    $time 세션만기시간, 0인경우 설정안함
     * @param string $dir  세션저장경로(절대경로), null인경우 설정안함
     */
    function session_start($time = 0, $dir = null) {
        if ($this->session_start_check()) {
            return;
        }
        if ($time > 0) {
            ini_set("session.gc_maxlifetime", $time);
        }
        if (isset($dir)) {
            ini_set("session.save_path", $dir);
        }
        session_start();
    }

    /**
     * - 세션 시작여부 확인
     * 
     * require  2025.01.17
     * @version 2025.01.17
     *
     * @return bool
     */
    function session_start_check() {
        if (php_sapi_name() !== 'cli') {
            if (version_compare(phpversion(), '5.4.0', '>=')) {
                return session_status() === PHP_SESSION_ACTIVE ? true : false;
            } else {
                return session_id() === '' ? false : true;
            }
        }
        return false;
    }

    /**
     * - 세션 값 제거
     * - `$key` 값이 null 인경우 전체 제거
     * 
     * require  2026.01.08
     * @version 2026.01.08
     *
     * @param string $key
     */
    function session_unset($key = null) {
        if ($key === null) {
            session_destroy();
        } else if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
// #endregion
// #region @ukp str
    /**
     * 문자열 공백추가후 반환  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     *
     * @param  string $text       문자열
     * @param  int    $length     euckr_bool 값이 true인경우 바이트길이, false인경우 문자열길이
     * @param  string $blank      공백문자열
     * @param  bool   $front_bool true: 앞에 공백, false(기본값): 뒤에 공백
     * @param  bool   $euckr_bool true: euc-kr, false(기본값): utf-8
     * @return string             공백추가 문자열($euckr_bool에 맞게 인코딩됨)
     */
    function str_pad($text, $length, $blank = " ", $front_bool = false, $euckr_bool = false) {
        if ($this->charset == "euc-kr") {
            $text = mb_convert_encoding($text, "UTF-8", "EUC-KR");
            $blank = mb_convert_encoding($blank, "UTF-8", "EUC-KR");
        }
        $add = 0;
        if ($euckr_bool) {
            $add = (strlen($text) - mb_strlen($text, "utf-8")) / 2;
        }
        $count = $length - mb_strlen($text, "utf-8") - $add;
        $blanks = $count > 0 ? str_repeat($blank, $count) : "";
        $text = $front_bool ? "{$blanks}{$text}" : "{$text}{$blanks}";
        return $euckr_bool ? mb_convert_encoding($text, "EUC-KR", "UTF-8") : $text;
    }

    /**
     * pkcs7 padding  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     *
     * @param  string $text 문자열
     * @return string       padding 추가 문자열
     */
    function str_pkcs7_padding($text) {
        $padding = 16 - strlen($text) % 16;
        $padding_text = str_repeat(chr($padding), $padding);
        return $text . $padding_text;
    }

    /**
     * pkcs7 unpadding  
     *   
     * require  2025.01.17
     * @version 2025.01.17
     *
     * @param  string $text 문자열
     * @return string       padding 제거 문자열
     */
    function str_pkcs7_unpadding($text) {
        $length = strlen($text);
        $unpadding = ord(substr($text, -1));
        return substr($text, 0, $length - $unpadding);
    }

    /**
     * 폴더경로 심플하게 바꾸기  
     *   
     * require  2025.10.30
     * @version 2025.10.30
     * 
     * @param  string $path 폴더경로
     * @return string       심플한 폴더경로
     */
    function str_simplify_path($path) {
        $absolute_bool = substr($path, 0, 1) === "/";
        $end_slash = substr($path, -1) === "/" ? "/" : "";
        $parts = explode('/', $path);
        $stack = array();
        foreach ($parts as $part) {
            if ($part === '' || $part === '.') {
                continue;
            }
            if ($part === '..') {
                if (!empty($stack) && end($stack) !== '..') {
                    array_pop($stack);
                } else if (!$absolute_bool) {
                    // For relative paths, keep leading ".."
                    $stack[] = '..';
                }
            } else {
                $stack[] = $part;
            }
        }
        // Reconstruct the simplified path is empty
        if (count($stack) === 0) {
            return $absolute_bool ? '/' : ('.' . $end_slash);
        }
        $simplified = implode('/', $stack);
        return ($absolute_bool ? '/' : '') . $simplified . $end_slash;
    }
// #endregion
// #region @ukp unique
    /**
     * - 시간, PID, 순차 번호를 조합하여 시스템 전체에서 고유한 식별자를 생성.
     * - 생성 포맷: [년월일시분(12)][마이크로초(6)][PID(7, 0-padding)][증가값(1~)]
     * 
     * require  2025.01.17
     * @version 2025.01.17
     *
     * @return string 숫자로만 구성된 문자열
     */
    function unique_id() {
        $time = explode(" ", str_replace("0.", "", microtime()));
        return date("YmdHis", $time[1]) . substr($time[0], 0, -2) . sprintf("%07d", getmypid()) . $this->custom_unique_index++;
    }

    /**
     * - `$id` 값 기준으로 고유한 임시값 생성
     * - `$id`와 `$pw`를 조합하여 해싱(Hashing), 입력이 같으면 항상 결과가 같음.
     * 
     * require  2025.01.17 encode_base64 unique_id
     * @version 2025.01.17
     *
     * @param  string $id        사용자 아이디
     * @param  string $pw        사용자 비밀번호
     * @param  bool   $temp_bool true: 항상 다른 값, false: 항상 같은 값
     * @return string
     */
    function unique_session_id($id, $pw, $temp_bool = false) {
        $str = $this->encode_base64($id, true) . "_";
        $str .= $temp_bool ? md5("{$id}_{$pw}_{$this->unique_id()}") : md5("{$id}_{$pw}");
        return $str;
    }
// #endregion
// #region @ukp user
    /**
     * 사용자 정보 문자열 설정 및 반환  
     * 로그에도 사용자 정보 문자열 출력됨  
     *   
     * require  2025.10.24
     * @version 2025.10.24
     * 
     * @param  string $str 사용자 정보 문자열, null인경우 반환만, 빈문자열인경우 초기화
     * @return string      사용자 정보 문자열
     */
    function user_info($str = null) {
        if ($str !== null) {
            $this->custom_user_info = strval($str);
        }
        return $this->custom_user_info;
    }
// #endregion
}