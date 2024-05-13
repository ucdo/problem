const CryptoJS = require('crypto-js');

class M {
    constructor() {
        // 使用MD5生成key并截取前16位
        this.key = CryptoJS.MD5("123456").toString().substring(0, 16);
        console.log({ key: this.key });
    }

    encrypt(str, iv) {
        // 将Key和IV转换为WordArray
        const keyWordArray = CryptoJS.enc.Utf8.parse(this.key);
        const ivWordArray = CryptoJS.enc.Utf8.parse(iv);

        // 加密
        const encrypted = CryptoJS.AES.encrypt(str, keyWordArray, {
            iv: ivWordArray,
            mode: CryptoJS.mode.CBC,
            padding: CryptoJS.pad.Pkcs7
        });

        // 返回Base64编码的字符串
        return encrypted.toString();
    }

    decrypt(encryptedStr, iv) {
        // 将Key和IV转换为WordArray
        const keyWordArray = CryptoJS.enc.Utf8.parse(this.key);
        const ivWordArray = CryptoJS.enc.Utf8.parse(iv);

        // 解密
        const decrypted = CryptoJS.AES.decrypt(encryptedStr, keyWordArray, {
            iv: ivWordArray,
            mode: CryptoJS.mode.CBC,
            padding: CryptoJS.pad.Pkcs7
        });

        // 返回UTF8编码的解密字符串
        return decrypted.toString(CryptoJS.enc.Utf8);
    }
}

// 示例IV。在实际应用中，IV应与PHP端的长度相同，并且在加密/解密时要保持一致。
const iv = CryptoJS.lib.WordArray.random(128 / 8).toString(CryptoJS.enc.Hex);
const m = new M();
console.log(`iv: ${iv}`);
const encrypted = m.encrypt("123123", iv);
console.log(`Encrypted: ${encrypted}`);
const decrypted = m.decrypt(encrypted, iv);
console.log(`Decrypted: ${decrypted}`);


console.log("xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx")
console.log(`iv: ${iv}`);
const encrypted1 = m.encrypt("admin", iv);
console.log(`account: ${encrypted1}`);
const encrypted2 = m.encrypt("123123", iv);
console.log(`password: ${encrypted2}`);