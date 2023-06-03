# Git
## wsl git
```
git --version
sudo add-apt-repository ppa:git-core/ppa     //更新最新的版本
sudo apt-get udpate
sudo apt-get upgrade
sudo apt-get install git
git --version
git config --global --lsit
//init git config global info
git config --global user.name "username"
git config --global user.email "useremail"
git config --global --list
```

## git command line
```
git log //查看git的日志
git fetch --all
git reset --hard origin/dev
```

## 导出最后一次提交
```shell
git archive HEAD --format=tar --output=last-commit.tar $(git diff-tree --no-commit-id --name-only -r HEAD)
```