class Solution:
    def findMedianSortedArrays(self, nums1, nums2) -> float:
        orderedList=nums1
        aux1=0
        aux2=0
        res=0
        for i in nums2:
            orderedList.append(i)
        orderedList.sort()
        Size=(len(orderedList))
        if Size % 2 == 0 :
            Size=int(Size/2)
            aux1=orderedList[Size-1]
            aux2=orderedList[Size]
            print(aux1)
            print(aux2)
            res=(aux1+aux2)/2
        else:
            Size=int(Size/2)
            res=float(round(orderedList[Size]))
            
        return(res)
NewClass = Solution()   
print(NewClass.findMedianSortedArrays([0,0],[0]))
        