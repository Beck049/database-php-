# Database_final_project 物流公司的物流管理系統
This is a project required in NTNU Course: Database
mainly in increasing the ability of database and if possible, I want do make it in pure javascript and pure PHP

This is the [Gerneral Database Concept](https://hackmd.io/YHarN_dYQ9mKbcj-JTUaeQ?view), please read it first before start developing

## Tools
- javascript
- PHP
- MySQL
- Apache

## Intorduction

### Motivation
對物流公司而言，確切掌握商品流向是減少成本的關鍵之一。一個好的管理系統能夠幫助公司提高管理的工作效率；改善物流公司內部以及整個供應鏈各個環節的管理、調度及資源分配成為物流公司必須考慮的問題，而解決問題的途徑之一就是建置一個有效的管理系統，這個管理系統可以提供給物流公司的員工登入以進行查詢訂單、資料分析等功能，也能提供消費者透過訂單ID查詢貨物狀態。

### Requirement Analysis
本專題內容為物流管理系統。系統可分為兩個模式，分別為顧客模式及管理員模式。訪客模式可供顧客透過物流訂單編號查詢貨物最新配送狀態[註1]。管理員模式需要透過帳號密碼登入，透過物流訂單編號查詢進行物流管理、查詢物流詳細資料，包含寄/收件人基本資料[註2]，貨品資料[註3]。另外，可新增/刪除/更改訂單資料。管理員模式亦提供分類功能，透過電商平台、寄收件縣市、貨物狀態等分類進行查詢，可提供資料分析用途。
> [註1] 包含出貨時間、到各縣市分派時間、到貨時間
> [註2] 包含姓名、電話、地址、編號
> [註3] 包含貨品內容(依照寄件者填寫)、價值(依照寄件者填寫)、購物平台、 分類

## System Structure
<img src="./pic/system" width="50%">

## Database Structure

### DDL Design

### Entity Table
|Name |Attribute|Description|
|:---:|:-------:|:---------:|

### Relation Table
|Name |Attribute|Description|
|:---:|:-------:|:---------:|

### E-R Diagram

## Function Description
1. 使用者可以申請會員，並登入更改自己的個人資訊，如：名字、密碼、地址。
2. 使用者可以透過特定索引將資料庫裡的資料分類以便於分析。
3. 使用者可以將商品加入自己的商場，並設定該商品的金額、數量。
4. 使用者可以透過訂單編號搜尋訂單狀態(分為：已出貨、配送中、已送達)
5. 使用者可以看見自己的交易歷史紀錄

## Wait Lists

|Improtance|Problem|Position|Description|
|:---:|:---:|:---:|:---:|
|High|Color Matching|Fix !!!|The color matching is ...|
|High|Modify Personal Data|Add Feature|we need a page to Modify Personal Data|
|medium|Add Product|Fix|dynamic display the block by clicking '+' & '-'|
|low|Modify Person|Root|lock the member check-box<br>check the position check-box|
|low|Modify Order|Modify|check if status != 0<br>then lock the function|
