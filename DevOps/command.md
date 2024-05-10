# linux
## 查看端口占用
```shell
netstat -anp | grep 端口号
```
## 通过进程id查找是哪个在使用
```shell
ps -aux | grep id
```

## 查看进程的信息
```shell
ps -aux | grep nginx
```

## 查看进程状态
```shell
ps -ef | grep nginx
```

## 磁盘挂在
### 查看未挂载磁盘

 ```
 sudo parted -l
    User
    [root@ecs-202391514334 ~]# sudo parted -l
    Model: Virtio Block Device (virtblk)
    Disk /dev/vda: 42.9GB
    Sector size (logical/physical): 512B/512B
    Partition Table: msdos
    Disk Flags: 
    
    Number  Start   End     Size    Type     File system  Flags
     1      1049kB  525MB   524MB   primary  ext4         boot
     2      525MB   42.9GB  42.4GB  primary  ext4
    Model: Virtio Block Device (virtblk)
    Disk /dev/vdb: 67.1MB
    Sector size (logical/physical): 512B/512B
    Partition Table: loop
    Disk Flags: 
    
    Number  Start  End     Size    File system  Flags
     1      0.00B  67.1MB  67.1MB  fat16
    
    
    Error: /dev/vdc: unrecognised disk label
    Model: Virtio Block Device (virtblk)                                      
    Disk /dev/vdc: 845GB
    Sector size (logical/physical): 512B/512B
    Partition Table: unknown
    Disk Flags: 
    
    Error: /dev/vdd: unrecognised disk label
    Model: Virtio Block Device (virtblk)                                      
    Disk /dev/vdd: 212GB
    Sector size (logical/physical): 512B/512B
    Partition Table: unknown
    Disk Flags: 
 ```

### 挂载
1.  创建挂载点
    sudo mkdir /mnt/vdb

2. 尝试挂载设备
   sudo mount 磁盘 创建的挂载点
   sudo mount /dev/vdb /mnt/vdb
3. 报错信息
    ```shell
    User
    [root@ecs-202391514334 ~]# sudo mount /dev/vdc /datadisk
    mount: /dev/vdc is write-protected, mounting read-only
    mount: unknown filesystem type '(null)'
    
    解决方式
    sudo mkfs.ext4 /dev/vdc
    在执行
    sudo mount /dev/vdb /mnt/vdb
    ```
4. 不能在一个挂载点挂载多个，会覆盖上一个


# windows
##  Windows cmd command line
查看端口使用情况
```shell
netstat -ano
```
查看某一个端口的使用情况
```shell
netstat -ano |findstr port
```
