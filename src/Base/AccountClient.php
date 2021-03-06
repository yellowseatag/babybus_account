<?php

namespace BabyBus\Account\Base;

use BabyBus\Account\CommonClient;

class AccountClient extends CommonClient
{
    /**
     * 一键登录
     * @param $access_token
     * @param $ip
     * @return mixed
     * @throws \Exception
     */
    public function syncGetPhone235($access_token, $ip)
    {
        $url = $this->accountApiUrl . "/AppSync/GetPhone235?Token=".$access_token."&LoginIP=".$ip;
        $params = [
            'Token' => $access_token,
            'LoginIP' => $ip,
        ];
        return $this->request($url, $params);
    }

    /**
     * 一键登录
     * @param $access_token
     * @param $ip
     * @return mixed
     * @throws \Exception
     */
    public function syncGetPhoneXiaoDu($access_token, $ip)
    {
        $url = $this->accountApiUrl . "/AppSync/GetPhoneXiaoDu?Token=".$access_token."&LoginIP=".$ip;
        $params = [
            'Token' => $access_token,
            'LoginIP' => $ip,
        ];
        return $this->request($url, $params);
    }

    /**
     * 注册登录
     * @param $phone
     * @param $ip
     * @return mixed
     * @throws \Exception
     */
    public function syncAccountRegister($phone, $ip)
    {
        $url = $this->accountApiUrl . "/AppSync/SyncAccountRegister";
        $params = [
            'Phone' => $phone,
            'LoginIP' => $ip,
        ];
        return $this->request($url, $params);
    }

    /**
     * 异步登录请求
     * @return mixed
     * @throws \Exception
     */
    public function syncLoginInfo()
    {
        $url = $this->accountApiUrl . "/AppSync/LoginInfo";
        $result = $this->request($url, []);
        return json_decode($result,true);
    }

    /**
     * 其他登录接口
     * @param string $phone
     * @param string $password
     * @param string $code
     * @param string $ip
     * @return mixed
     * @throws \Exception
     */
    public function phoneLoginRegisterV2(string $phone, string $password, string $code, string $ip)
    {
        $url = $this->accountApiUrl . "/AppSync/PhoneLoginRegisterV2";
        $params = [
            'Phone' => $phone,
            'Password' => $password,
            'CaptchaNo' => $code,
            'LoginIP' =>  $ip
        ];
        return $this->request($url, $params);
    }

    /**
     * 一键登录
     * @param string $token
     * @param string $ip
     * @return mixed
     * @throws \Exception
     */
    public function phoneLoginRegister235(string $token, string $ip)
    {
        $url = $this->accountApiUrl . "/AppSync/PhoneLoginRegister235";
        $params = [
            'Token' => $token,
            'LoginIP' =>  $ip
        ];
        return $this->request($url, $params);
    }

    /**
     * 登录接口
     * @param string $phone
     * @param string $password
     * @param string $code
     * @param string $ip
     * @return mixed
     * @throws \Exception
     */
    public function loginPhone(string $phone, string $password, string $code, string $ip)
    {
        $url = $this->accountApiUrl . "/AppSync/LoginPhone";
        $params = [
            'Phone' => $phone,
            'Password' => $password,
            'CaptchaNo' => $code,
            'LoginIP' =>  $ip
        ];
        return $this->request($url, $params);
    }

    /**
     * 退出
     * @return mixed
     * @throws \Exception
     */
    public function loginOut()
    {
        $url = $this->accountApiUrl . "/AppSync/LoginOut";
        return $this->request($url, []);
    }

    /**
     * 注销接口
     * @param string $phone
     * @param string $code
     * @return mixed
     * @throws \Exception
     */
    public function deleteAccount(string $phone, string $code)
    {
        $url = $this->accountApiUrl . "/AppSync/DeleteAccount";
        $params = [
            'Phone' => $phone,
            'CaptchaNo' => $code,
        ];
        return $this->request($url, $params);
    }

    /**
     * 获取登陆信息
     * @return mixed
     * @throws \Exception
     */
    public function loginInfo()
    {
        $url = $this->accountApiUrl . "/AppSync/LoginInfo";
        return $this->request($url, []);
    }

    /**
     * 修改密码
     * @param string $oldPassword
     * @param string $newPassword
     * @return mixed
     * @throws \Exception
     */
    public function changePassword(string $oldPassword, string $newPassword)
    {
        $url = $this->accountApiUrl . "/AppSync/ChangePassword";
        $params = [
            'OldPassword' => $oldPassword,
            'NewPassword' => $newPassword
        ];
        return $this->request($url, $params);
    }

    /**
     * 重置密码
     * @param string $phone
     * @param string $password
     * @param string $code
     * @return mixed
     * @throws \Exception
     */
    public function forgetPassword(string $phone, string $password, string $code)
    {
        $url = $this->accountApiUrl . "/AppSync/ForgetPassword";
        $params = [
            'Phone' => $phone,
            'Password' => $password,
            'CaptchaNo' => $code
        ];
        return $this->request($url, $params);
    }

    /**
     * 增加用户vip时长
     * @param $live_type
     * @param $live_num
     * @param int $is_special
     * @return mixed
     * @throws \Exception
     */
    public function addVipTimeTransfer($live_type, $live_num, $is_special=0)
    {
        $url = $this->accountApiUrl . "/AppSync/AddVipTimeTransfer";
        $params = [
            'LiveTimeType' => $live_type, //1天2月3年
            'LiveTimeNum' => $live_num,
            'IsSpecial' => $is_special
        ];
        return $this->request($url, $params);
    }

    /**
     * 兑换码
     * @param $cdkey
     * @return mixed
     * @throws \Exception
     */
    public function exchange($cdkey)
    {
        $url = $this->accountApiUrl . "/AppSync/Exchange";
        $params = [
            'Code' => $cdkey, //cdkey
        ];
        return $this->request($url, $params);
    }

    /**
     * 调用发送短信验证接口
     * @param string $phone
     * @return mixed
     * @throws \Exception
     */
    public function sendSmsCaptcha(string $phone)
    {
        $url = $this->accountApiUrl . "/AppSync/SendSmsCaptcha";
        $params = [
            'Phone' => $phone,
        ];
        return $this->request($url, $params);
    }

    /**
     * 验证短信接口
     * @param string $phone
     * @param string $code
     * @return mixed
     * @throws \Exception
     */
    public function checkSmsCaptcha(string $phone, string $code)
    {
        $url = $this->accountApiUrl . "/AppSync/CheckSmsCaptcha";
        $params = [
            'Phone' => $phone,
            'CaptchaNo' => $code
        ];
        return $this->request($url, $params);
    }

}