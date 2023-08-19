## String
```
    command line
    set key value
    get key value
    setnx key value                     //if key not exsit,write and return 1,else return 0
    flushdb                             //delete all data from this db
    select db                           //checkout db

    incr key                            //can only change number. And if key not exsit,create key and it`s value = 1
    decr key                            //like incr.And if key not exsit ,create key and it`s value = -1
    incrby key step                     //incr step for key. And ifkey not exsit,create key and it`s value = step
    decrby key step                     //decr step for key. And ifkey not exsit,create key and it`s value = step

    mset key1 value1 key2 value2 ...
    msetnx key1 value1 key2 value2 ... // Atomicity.原子性。
    

    getrange start end  //out of range return ''.If end = -1 return start to value end
    setrange start end  //

    setex key ttl       //set key expire ttl seconds later.
    ttl key             //get expire time
    getset key value    // set key for new value,and return old value if old is not expire,else return nil

    maxsize 512M
```
## List
Double Linked List
ziplist <-> ziplist <-> ziplist <-> ziplist       //construct a quicklist

```
    lpush\rpush key value1 [value2...]            //append to the list head or tail.
    lrange key start stop                         // stop = -1 ,get all data
    lpop key
    rpop key
    rpoplpush list1 list2                         //pop one of list1`s tail and insert to the list2`s head
    lindex key index                              // index = -1 last data 
    llen                                          //get list len
    linsert listName BEFORE|AFTER listvalue value //If listvalue not exist,return -1,If listName is not list,return error  
    lrem listname count value                     //delete count key from list. if count = 0,delete all from list where listvalue = value
    lset listname index value                     //replace list[index] by value.If index not exsit,return error.  
```

## Set
Hashtable

```
    sadd key value1 ....                //add a set with values
    smember key                         //return all member
    sismember key value                 //check value in set or not
    scard key                           //return count of set
    srem key value1 ...                 //remove one or more value in set
    spop key count                      //pop random values reforencen by count
    srandmember key count               //get random member from set reforence by count
    smove set1 set2 member              //move member of set1 to set2
    sinter set1 set2 ...                //get intersection of sets
    sinterstore aimset set1 set2 ...    //write interserction to aimset of set1 set2 ...
    sunion set1 set2 ...                //get union of set1 set2 ...
    sdiff set1 set2 ...                 //get diff of set1 set2 ...
    sdiffstore aimset set1 set2 ...     //write diff to aimset of set1 set 2 ...                                        
```

## Hash
`key` => `value`
```
    hset name key value                 //add key value for name
    hget name key                       //get key`s value
    hexists name key                    //check key exist or not
    hkeys name                          //get all keys
    hvals name                          //get all values
    hlen name                           //get len of hash
    hincrby name key incrNum            //if incrnum > 0, add incrnum < 0,decr. if key`s value is not a number,error.Not exist,create.
    hsextnx name key value              //if not key exist,creat.else do noting 
```

## zset (sorted set)
```
    zadd zname score name1 score name2...                   //add to zset unique name with score, score can repeat
    zrange zname start end [WITHSCORES]                     //get zname`s value from start to end,if WITHSCORES list their score
    zrevrange zname start end [WITHCORES]                   //get values by decr
    zrangebyscore zname mixscore maxscore [WITHSCORES]      //get values between min and max score 
    zrevranagebyscore zname mixscore max score [WITHSCORES] //reverse
    zinrcby zname increament member                         //if increament > 0, add increament < 0,decr. if key`s value is not a number,error.Not exist,create.
    zrem zname member1 member2 ...                          //remove.if member not exist, skip.
    zremrangebyrank zname start end                         //delete by rank.end = -1 means last one.
    zremrangebyscore zname minscore maxscore                //delete member bewteen min score and max score
    zcount zname minscore maxscore                          //count member between min score and max score
    zrank zname member                                      //return rank of the member,the first is zero.
    zrevrank zname member                                   //return reverse rank of the member,the end id zero.
    zscore zname member                                     //return the member`s  score
```
### zset and jumptable 
```
    according to score and create a jumptable, and index
```

## subscribe and publish
```
    subscribe channel1 channel2                             //subscribe one or more channel
    publish channame message                                //publish message to subscribe
    psubscribe pattern                                      //subscribe channels by pattern
```

## geo
```
    geoadd gname  longitude lantitude member ...              //add addresses
    geopos gname member1 member2 ...                          //get geo member`s address
    geodist gname member1 member2 [m|km|ft|mi]                //get distance of two members
    georedius gname longitude lantitude redius m|km|ft|mi     //use longitude and lantitude as point and redius as long,the round of element
```

## transaction

```
    MULTI
    ...                                                         //if hava a error command, `EXEC` retutrn (error) EXECABORT Transaction discard...
    EXEC|DISCARD                                                //exec or discard
```

```
    WATCH key1 ...
    MULTI
    ...
    EXCE     
    当对 key1 ...进行监听，如果在事务 `EXCE` 之前，被 `watch` 的 `key` 被修改了，那么事务直接执行失败。                                                   
```

## permission deny
```
    describe: Failed opening the RDB file dump.rdb (in server root dir /usr/local) for saving: Permission denied
    sudo redis-server
    
    if only run redis-server,you may have no permission for wrire RBD file.
```

## remote connect
``` 
    redis-cli -h `ip` -p `port` -a `password`
```

## looking for password
``` 
    redis` config -> search   requriepass
```

## update password
``` 
    you need restart redis-server,then the change will take effect.
```