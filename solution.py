# Definition for singly-linked list.
# class ListNode(object):
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next
class Solution(object):
    def addTwoNumbers(self, l1, l2):
        self.l1 = l1[::-1]
        self.l2 = l2[::-1]
        ListRes=[]
        
        NumL1=int("".join(str(num) for num in self.l1))
        NumL2=int("".join(str(num) for num in self.l2))
        NumRes=str(NumL1+NumL2)
        for i in NumRes:
            ListRes.append(int(i))
        return ListRes[::-1]
        """
        :type l1: ListNode
        :type l2: ListNode
        :rtype: ListNode
        """
solutions=Solution()
print (solutions.addTwoNumbers([9,9,9,9,9,9,9],[9,9,9,9]))
        