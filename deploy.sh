#!/bin/bash

# Xiaoxu主题自动部署脚本
# 用于构建Vue项目并自动推送到GitHub

echo "=== Xiaoxu主题自动部署脚本 ==="

# 设置变量
WEB_DIR="./web"
XIAOXU_DIR="./web/Xiaoxu"
BUILD_DIR="./web/Xiaoxu"

# 检查是否在正确的目录
if [ ! -d "$WEB_DIR" ]; then
    echo "❌ 错误: 未找到web目录，请确保在项目根目录运行此脚本"
    exit 1
fi

# 检查Git仓库
if [ ! -d ".git" ]; then
    echo "❌ 错误: 未初始化Git仓库"
    exit 1
fi

# 进入web目录并构建项目
echo "📦 开始构建Vue项目..."
cd "$WEB_DIR"

# 检查package.json是否存在
if [ ! -f "package.json" ]; then
    echo "❌ 错误: 未找到package.json文件"
    exit 1
fi

# 安装依赖（如果node_modules不存在）
if [ ! -d "node_modules" ]; then
    echo "📥 安装项目依赖..."
    npm install
    if [ $? -ne 0 ]; then
        echo "❌ 依赖安装失败"
        exit 1
    fi
fi

# 构建项目
echo "🔨 构建项目..."
npm run build
if [ $? -ne 0 ]; then
    echo "❌ 项目构建失败"
    exit 1
fi

# 回到根目录
cd ..

# 检查构建结果
if [ ! -d "$XIAOXU_DIR/assets" ]; then
    echo "❌ 错误: 构建后未找到assets目录"
    exit 1
fi

echo "✅ 项目构建成功"

# Git操作
echo "📤 准备提交到Git..."

# 添加所有Xiaoxu相关文件
git add web/Xiaoxu/

# 检查是否有变更
if git diff --cached --quiet; then
    echo "ℹ️  没有检测到变更，跳过提交"
else
    # 提交变更
    COMMIT_MSG="🚀 自动部署: $(date '+%Y-%m-%d %H:%M:%S')"
    echo "💾 提交变更: $COMMIT_MSG"
    git commit -m "$COMMIT_MSG"
    
    if [ $? -ne 0 ]; then
        echo "❌ Git提交失败"
        exit 1
    fi
    
    # 推送到远程仓库
    echo "⬆️  推送到GitHub..."
    git push
    
    if [ $? -ne 0 ]; then
        echo "❌ 推送失败，可能需要设置远程仓库"
        echo "💡 使用以下命令设置远程仓库:"
        echo "   git remote add origin https://github.com/your-username/your-repo.git"
        echo "   git branch -M main"
        echo "   git push -u origin main"
        exit 1
    fi
    
    echo "✅ 成功推送到GitHub"
fi

echo ""
echo "🎉 部署完成！"
echo "📁 已更新的文件结构："
echo "   Xiaoxu/"
echo "   ├── assets/     (静态资源)"
echo "   ├── views/"
echo "   │   └── index.blade.php"
echo "   └── XiaoxuTheme.php"
echo ""
echo "🔗 GitHub仓库: $(git config --get remote.origin.url 2>/dev/null || echo '未设置')"
