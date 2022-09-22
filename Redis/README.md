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
    sadd key value1 ....        //add a set with values
    smember key                 //return all member
```
