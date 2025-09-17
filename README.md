# 🎨 Xiaoxu 主题

> 基于 Vue3 + Vite + Laravel 的现代化图床主题，采用前后端分离架构

[![Build Status](https://github.com/WuMe-sicx/xiaoxu-theme/workflows/🚀%20自动部署%20Xiaoxu%20主题/badge.svg)](https://github.com/WuMe-sicx/xiaoxu-theme/actions)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Vue 3](https://img.shields.io/badge/Vue-3-4FC08D?logo=vue.js&logoColor=white)](https://vuejs.org/)
[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?logo=laravel&logoColor=white)](https://laravel.com/)

## 📋 项目简介

Xiaoxu 主题是一个专为兰空图床开发的现代化主题，采用 Vue3 + Laravel 混合部署架构，提供优秀的用户体验和强大的功能。

### ✨ 主要特性

- 🎯 **前后端分离**: Vue3 SPA + Laravel API
- 🚀 **现代技术栈**: Vue3 + Vite + TypeScript + Tailwind CSS
- 📱 **响应式设计**: 完美适配桌面和移动设备
- 🎨 **美观界面**: 采用 NativeUI 组件库
- 🔄 **自动部署**: GitHub Actions 自动化工作流
- ⚡ **高性能**: Vite 构建，资源优化

## 📁 项目结构

```
Xiaoxu/
├── assets/                    # 静态打包资源
│   ├── *.js                  # JavaScript 文件
│   ├── *.css                 # 样式文件
│   ├── *.gz                  # Gzip 压缩文件
│   └── images/               # 图片资源
├── views/                    # 视图文件
│   └── index.blade.php       # 主页面模板
└── XiaoxuTheme.php          # 主题类文件
```

## 🚀 快速开始

### 环境要求

- PHP >= 8.0
- Laravel >= 9.0
- 兰空图床系统

> 💡 **注意**: 本仓库包含的是已构建好的静态文件，无需Node.js环境，可直接部署使用。

### 💻 部署到兰空图床

#### 方法一：新建主题目录（推荐）

```bash
# 进入兰空图床主题目录
cd /path/to/your/lsky/themes

# 克隆主题到Xiaoxu目录
git clone https://github.com/WuMe-sicx/xiaoxu-theme.git Xiaoxu
```

#### 方法二：覆盖现有目录

如果已存在 `Xiaoxu` 目录：

```bash
# 进入现有Xiaoxu目录
cd /path/to/your/lsky/themes/Xiaoxu

# 克隆到当前目录（会覆盖现有文件）
git clone https://github.com/WuMe-sicx/xiaoxu-theme.git .
```

### ⚠️ 重要提醒

**请确保目标目录名称为 `Xiaoxu`**，这样Laravel才能正确识别主题：

```
themes/
└── Xiaoxu/              ← 目录名必须是 Xiaoxu
    ├── assets/          ← 静态资源文件
    ├── views/
    │   └── index.blade.php
    └── XiaoxuTheme.php
```

### 🎛️ 启用主题

1. 登录兰空图床管理后台
2. 进入 **系统设置** → **主题管理**
3. 选择 **Xiaoxu** 主题
4. 点击 **启用** 即可

## 🔄 更新主题

### 获取最新版本

```bash
# 进入主题目录
cd /path/to/your/lsky/themes/Xiaoxu

# 拉取最新更新
git pull origin main
```

### 自动更新脚本（可选）

创建一个更新脚本 `update-theme.sh`：

```bash
#!/bin/bash
echo "🔄 正在更新Xiaoxu主题..."
cd /path/to/your/lsky/themes/Xiaoxu
git pull origin main
echo "✅ 主题更新完成！"
```

## 📦 开发者部署（仅开发者需要）

<details>
<summary>🔧 点击展开开发者部署选项</summary>

### 本地构建部署

```bash
# 运行自动部署脚本
./deploy.sh
```

### GitHub Actions 自动部署

推送代码后自动构建和部署到GitHub。

</details>

## ⚙️ 主题配置

### 主题定制选项

登录兰空图床管理后台，进入主题设置可配置：

1. **基础设置**
   - 网站标题、副标题
   - 网站图标和描述
   - 首页横幅内容

2. **背景设置**
   - 首页背景图片
   - 登录页背景图片
   - 支持多张图片轮播

3. **模块控制**
   - 产品功能模块
   - 用户作品展示
   - 价格计划显示

4. **友情链接**
   - 自定义友情链接
   - 支持添加多个链接

5. **高级设置**
   - 自定义CSS样式
   - 自定义JavaScript代码

### 主题特性

- ✨ **响应式设计**：完美适配桌面和移动设备
- 🚀 **性能优化**：Gzip压缩，资源优化，快速加载
- 🎨 **现代界面**：Vue3 + NativeUI 精美界面
- 🔧 **高度可定制**：丰富的配置选项
- 🛡️ **安全稳定**：基于Laravel框架，安全可靠

## 🔧 故障排除

### 常见问题

**Q: 主题无法启用？**
- 确认目录名称为 `Xiaoxu`（注意大小写）
- 检查文件权限，确保Web服务器可以访问
- 确认 `XiaoxuTheme.php` 文件存在

**Q: 静态资源加载失败？**
- 检查 `assets` 目录是否完整
- 确认Web服务器配置允许访问静态文件
- 清除浏览器缓存后重试

**Q: 主题更新失败？**
```bash
# 强制更新到最新版本
git fetch origin main
git reset --hard origin/main
```

**Q: 页面显示异常？**
- 检查PHP版本是否符合要求（>= 8.0）
- 确认Laravel版本兼容性
- 查看服务器错误日志

## 📈 性能优化

- ✅ 代码分割和懒加载
- ✅ Gzip 压缩
- ✅ 图片优化
- ✅ CSS 和 JS 压缩
- ✅ CDN 支持

## 🤝 贡献指南

1. Fork 此仓库
2. 创建功能分支 (`git checkout -b feature/AmazingFeature`)
3. 提交更改 (`git commit -m 'Add some AmazingFeature'`)
4. 推送到分支 (`git push origin feature/AmazingFeature`)
5. 创建 Pull Request

## 📄 许可证

本项目采用 MIT 许可证 - 查看 [LICENSE](LICENSE) 文件了解详情

## 🙏 致谢

- [Vue.js](https://vuejs.org/) - 渐进式 JavaScript 框架
- [Laravel](https://laravel.com/) - PHP Web 应用框架
- [Vite](https://vitejs.dev/) - 下一代前端构建工具
- [Tailwind CSS](https://tailwindcss.com/) - 实用优先的 CSS 框架

## 📞 支持

如遇问题，请：
- 📝 [提交 Issue](https://github.com/your-username/xiaoxu-theme/issues)
- 💬 参与 [Discussions](https://github.com/your-username/xiaoxu-theme/discussions)

---

⭐ 如果这个项目对您有帮助，请给一个星标支持！
