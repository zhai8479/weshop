# 项目概述
- 产品名称: weshop
- 项目地址: https://github.com/zhai8479/weshop

weshop 是一个简单的 RestFul 风格的商城服务端.使用Laravel 5.5 编写而成

# 功能如下
- 用户认证: 注册, 登陆, 登出
- 个人中心: 个人信息显示, 信息编辑
- 积分: 积分获取, 积分使用, 积分显示
- 后台: 控制用户信息, 控制商品信息等后台管理
- 商品: 添加商品, 修改商品, 显示商品, 购买商品
- 订单: 创建订单, 支付订单, 订单状态等
- 收货地址: 管理收货地址

# 运行环境
- CentOS/>=7.0
- PHP/>=7.0
- MySQL/>=5.6

# 开发环境部署/安装
1. 克隆代码
克隆 `weshop` 到本地目录中
```bash
git clone git@github.com:zhai8479/weshop.git
```

2. 配置本地编辑器与开发服务器文件同步操作

3. 安装依赖包
```bash
composer install -vvv
```

4. 生成配置文件
```
cp .env.example .env
```
根据情况更改 `.env` 中的配置

5. 生成表及数据填充
```
php artisan migrate --seed
```

6. 生成密钥
```
php artisan key:generate
```

7. 配置hosts (可选)


# 服务器架构说明

# 代码上线

# 扩展包说明

# 自定义 Artisan 命令列表

# 队列列表